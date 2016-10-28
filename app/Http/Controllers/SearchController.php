<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Paper;
use Auth;

class SearchController extends Controller
	{

	public function find( Request $request )
		{

		$page = 'results';
        $name = '';

		$papers = Paper::where( 'description', 'LIKE', '%' . $request[ 'search' ] . '%' )->paginate();
		$search = $request[ 'search' ];
        $categories = Category::where( 'user_id', Auth::user()->id )->orderBy( 'name', 'ASC' )->get();

		return view( 'search.results', compact( 'page', 'papers', 'search', 'categories', 'name' ) );

		}

	}
