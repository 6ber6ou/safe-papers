<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Paper;
use Auth;

class CategoriesController extends Controller
	{

	public function search( $name )
		{

		$page = 'search_by_category';
		$category = Category::where( 'name', $name )->first();
		$papers = Paper::where( 'category_id', $category->id )->where( 'user_id', Auth::user()->id )->get();

		return view( 'search.category', compact( 'page', 'papers', 'category' ) );

		}

	}