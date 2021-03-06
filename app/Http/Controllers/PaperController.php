<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Http\Requests\SavePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Paper;
use Auth;
use Illuminate\Support\Facades\Storage;
use File;
use Image;
use JavaScript;

class PaperController extends Controller
	{

    public function __construct()
    {

    $this->middleware( 'auth' );

    }

    // ------------------------------------------------------------

	public function add()
		{

        $page = 'add_paper';
        $categories = Category::select( 'name' )->where( 'user_id', Auth::user()->id )->get()->toArray();
        $categories = array_flatten( $categories );

        JavaScript::put( [ 'categories' => $categories ] );

        return view( 'papers.add_new_paper', compact( 'page' ) );

		}

    // ------------------------------------------------------------

	public function save( SavePaperRequest $request )
		{

		$image = request()->file( 'file' );

		$image = Image::make( $image )->widen( 1500, function( $constraint )
			{

			$constraint->upsize();

			} )->stream();

		$image = $image->__toString();

		$file_name = uniqId() . '.jpg';

		Storage::disk( 'uploads' )->put( '/public/' . $file_name, $image );

		// Save Thumb 50 px Height
		$image = Image::make( $image )->widen( 50, function( $constraint )
			{

			$constraint->upsize();

			} )->stream();

		$image = $image->__toString();

		Storage::disk( 'uploads' )->put( '/public/thumbs/' . $file_name, $image );

		// Category
		$category_exists = Category::where( 'name', $request->input( 'category' ) )->count();

		if( $category_exists == 0 )
			{

			Category::create(
				[

				'name' => ucfirst( $request->input( 'category' ) ),
				'slug' => str_slug( $request->input( 'category' ) ),
				'user_id' => Auth::user()->id

				] );

			}

		$category = Category::select( 'id' )->where( 'name', $request->input( 'category' ) )->first();

		$new_paper = Paper::create(
			[

			'description' => $request->input( 'description' ),
			'path' => $file_name,
			'user_id' => Auth::user()->id,
			'category_id' => $category->id

			] );

		flash( 'Opération effectuée avec succès !', 'success' );

		return $new_paper->id;

		}

    // ------------------------------------------------------------

	public function delete( $id )
		{

		// Delete Category if empty
		$paper = Paper::where( 'id', $id )->where( 'user_id', Auth::user()->id )->first();
		$paper_count = Paper::where( 'user_id', Auth::user()->id )->count();

		if( $paper_count == 1 )
			{

			$paper->category->delete();

			}

		// Delete file
		File::delete( 'papers/public/' . $paper->path );
		File::delete( 'papers/public/thumbs/' . $paper->path );

		$paper->delete();

		flash( 'Opération effectuée avec succès !', 'success' );

		return redirect()->route( 'home' );

		}

    // ------------------------------------------------------------

	public function show_update( $id )
		{

        $page = 'update_paper';
        $paper = Paper::where( 'user_id', Auth::user()->id )->where( 'id', $id )->first();

        return view( 'papers.update_new_paper', compact( 'page', 'paper' ) );

		}

    // ------------------------------------------------------------

	public function update( UpdatePaperRequest $request )
		{

		$paper = Paper::findOrFail( $request->input( 'paper_id' ) );
		$paper->description = $request->input( 'description' );
		$paper->category->name = ucfirst( $request->input( 'category' ) );
		$paper->category->slug = str_slug( $request->input( 'category' ) );
		$paper->category->save();
		$paper->save();

		flash( 'Opération effectuée avec succès !', 'success' );

		return redirect()->route( 'show_paper', $request->input( 'paper_id' ) );

		}

    // ------------------------------------------------------------

	public function show( $id )
		{

		$page = 'show_paper';
		$paper = Paper::where( 'id', $id )->where( 'user_id', Auth::user()->id )->first();

		$paper->consulted_at = date( 'Y-m-d H:i:s' );
		$paper->update();

        return view( 'papers.show_paper', compact( 'page', 'paper' ) );

		}

    // ------------------------------------------------------------

	public function resize( $id )
		{

		$page = 'resize_paper';
		$paper = Paper::where( 'id', $id )->where( 'user_id', Auth::user()->id )->first();

		list( $width_img, $height_img ) = getimagesize( asset( 'papers/public/' . $paper->path ) );

		if( $paper == NULL ) abort( 404 );

        return view( 'papers.resize_paper', compact( 'page', 'paper', 'width_img', 'height_img' ) );

		}

    // ------------------------------------------------------------

	public function post_resize( Request $request, $id )
		{

		$paper = Paper::where( 'id', $id )->where( 'user_id', Auth::user()->id )->first();

		if( $request->input( 'cx' ) != '' && $request->input( 'cy' ) != '' && $request->input( 'cw' ) != '' &&  $request->input( 'ch' ) != '' )
			{

			$image = Image::make( asset( 'papers/public/' . $paper->path ) );
			$image->crop( $request->input( 'cw' ) , $request->input( 'ch' ), $request->input( 'cx' ), $request->input( 'cy' ) )->stream();
			$image = $image->__toString();

			Storage::disk( 'uploads' )->put( '/public/' . $paper->path, $image );

			// Save Thumb 50 px Height
			$image = Image::make( asset( 'papers/public/' . $paper->path ) )->widen( 50, function( $constraint )
				{

				$constraint->upsize();

				} )->stream();

			$image = $image->__toString();

			Storage::disk( 'uploads' )->put( '/public/thumbs/' . $paper->path, $image );

			}

		return redirect()->route( 'show_paper', $paper->id );

		}

    // ------------------------------------------------------------

	public function show_all()
		{

		$page = 'show_all_papers';
		$name = '';
		$papers = Paper::where( 'user_id', Auth::user()->id )->orderBy( 'updated_at', 'DESC' )->paginate( 10 );
		$categories = Category::where( 'user_id', Auth::user()->id )->orderBy( 'name', 'ASC' )->get();

        return view( 'papers.show_all_papers', compact( 'page', 'papers', 'name', 'categories' ) );

		}

    // ------------------------------------------------------------

	public function rotate( $id )
		{

		$page = 'rotate_paper';
		$name = '';
		$paper = Paper::where( 'id', $id )->where( 'user_id', Auth::user()->id )->first();

		$image = Image::make( asset( 'papers/public/' . $paper->path ) );
		$image->rotate( - 90 )->stream();
		$image = $image->__toString();

		Storage::disk( 'uploads' )->put( '/public/' . $paper->path, $image );

		// Save Thumb 50 px Height
		$image = Image::make( asset( 'papers/public/' . $paper->path ) )->widen( 50, function( $constraint )
			{

			$constraint->upsize();

			} )->stream();

		$image = $image->__toString();

		Storage::disk( 'uploads' )->put( '/public/thumbs/' . $paper->path, $image );

		return redirect()->route( 'show_paper', $paper->id );

		}

    // ------------------------------------------------------------

	public function show_paper_prev( $id )
		{

		$page = 'show_paper_prev';
		$name = '';

		$paper = Paper::where( 'id', '<', $id )->where( 'user_id', Auth::user()->id )->orderBy( 'id', 'DESC' )->first();

		if( $paper == NULL )
			{

			$paper = Paper::where( 'user_id', Auth::user()->id )->orderBy( 'id', 'DESC' )->first();

			}

        return view( 'papers.show_paper', compact( 'page', 'paper' ) );

		}

    // ------------------------------------------------------------

	public function show_paper_next( $id )
		{

		$page = 'show_paper_next';
		$name = '';

		$paper = Paper::where( 'id', '>', $id )->where( 'user_id', Auth::user()->id )->orderBy( 'id', 'ASC' )->first();

		if( $paper == NULL )
			{

			$paper = Paper::where( 'user_id', Auth::user()->id )->orderBy( 'id', 'ASC' )->first();

			}

        return view( 'papers.show_paper', compact( 'page', 'paper' ) );

		}
	}
