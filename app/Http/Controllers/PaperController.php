<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Http\Requests\SavePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Paper;
use Auth;
use JavaScript;
use Storage;

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

        JavaScript::put( [ 'categories' => array_flatten( $categories ) ] );

        return view( 'papers.add_new_paper', compact( 'page' ) );

		}

    // ------------------------------------------------------------

	public function save( SavePaperRequest $request )
		{

		$path = request()->file( 'file' )->store( 'safe-papers', 's3' );

		$category_exists = Category::where( 'name', $request->input( 'category' ) )->count();

		if( $category_exists == 0 )
			{

			Category::create(
				[

				'name' => ucfirst( strtolower( $request->input( 'category' ) ) ),
				'user_id' => Auth::user()->id

				] );

			}

		$category = Category::select( 'id' )->where( 'name', $request->input( 'category' ) )->first();

		Paper::create(
			[

			'description' => $request->input( 'description' ),
			'path' => $path,
			'user_id' => Auth::user()->id,
			'category_id' => $category->id

			] );

		flash( 'Opération effectuée avec succès !', 'success' );

		return back();

		}

    // ------------------------------------------------------------

	public function delete()
		{

		Paper::find( $_GET[ 'id' ] )->delete();

		// Delete file on S3

		return $_GET[ 'id' ];

		}

    // ------------------------------------------------------------

	public function show_update( $id )
		{

        $page = 'update_paper';
        $categories = Category::select( 'name' )->where( 'user_id', Auth::user()->id )->get()->toArray();
        $paper = Paper::where( 'user_id', Auth::user()->id )->where( 'id', $id )->first();

        JavaScript::put( [ 'categories' => array_flatten( $categories ) ] );

        return view( 'papers.update_new_paper', compact( 'page', 'paper' ) );

		}

    // ------------------------------------------------------------

	public function update( UpdatePaperRequest $request )
		{

		$category = Category::where( 'name', $request->input( 'category' ) )->first();

		$paper = Paper::findOrFail( $request->input( 'paper_id' ) );
		$paper->description = $request->input( 'description' );
		$paper->category_id = $category->id;
		$paper->update();

		flash( 'Opération effectuée avec succès !', 'success' );

		return redirect()->route( 'home' );

		}

	}