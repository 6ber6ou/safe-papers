<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Http\Requests\SavePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Paper;
use Auth;
use Illuminate\Support\Facades\Storage;
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

		$s3 = Storage::disk( 's3' );
		$s3->put( '/safe-papers/' . $file_name, $image, 'public' );

		// Save Thumb 150 px Height
		$image = Image::make( $image )->widen( 150, function( $constraint )
			{

			$constraint->upsize();

			} )->stream();

		$image = $image->__toString();

		$s3 = Storage::disk( 's3' );
		$s3->put( '/safe-papers/thumbs/' . $file_name, $image, 'public' );

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
			'path' => 'safe-papers/' . $file_name,
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
		$paper = Paper::find( $id )->where( 'user_id', Auth::user()->id )->first();
		$paper_count = Paper::where( 'user_id', Auth::user()->id )->count();

		if( $paper_count == 1 )
			{

			$paper->category->delete();

			}

		// Delete file on S3
		Storage::disk( 's3' )->delete( $paper->path );

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

		$category = Category::where( 'name', $request->input( 'category' ) )
							->where( 'user_id', Auth::user()->id )
							->first();

		if( $category == NULL )
			{

			$category = Category::create(
				[

				'name' => ucfirst( $request->input( 'category' ) ),
				'slug' => str_slug( $request->input( 'category' ) ),
				'user_id' => Auth::user()->id

				] );

			}

		$paper = Paper::findOrFail( $request->input( 'paper_id' ) );
		$paper->description = $request->input( 'description' );
		$paper->category_id = $category->id;
		$paper->update();

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

	}
