<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Paper;
use Auth;
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

        JavaScript::put( [ 'categories' => array_flatten( $categories ) ] );

        return view( 'papers.add_new_paper', compact( 'page' ) );

		}

    // ------------------------------------------------------------

	public function save( Request $request )
		{

		$category_exists = Category::where( 'name', $request->input( 'category' ) )->count();

		if( $category_exists == 0 )
			{

			Category::create(
				[

				'name' => ucfirst( strtolower( $request->input( 'category' ) ) ),
				'user_id' => Auth::user()->id

				] );

			}

		$file_name = request()->file( 'file' )->store( 'safe-papers', 's3' );

		$category = Category::select( 'id' )->where( 'name', $request->input( 'category' ) )->first();

		Paper::create(
			[

			'path' => $file_name,
			'user_id' => Auth::user()->id,
			'category_id' => $category->id

			] );

		return back();

		}

	}
