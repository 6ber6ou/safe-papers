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
		$category = Category::where( 'slug', str_slug( $name ) )->first();
		$categories = Category::where( 'user_id', Auth::user()->id )->get();
		$papers = Paper::where( 'category_id', $category->id )->where( 'user_id', Auth::user()->id )->paginate( 10 );

		return view( 'search.category', compact( 'page', 'papers', 'category', 'categories', 'name' ) );

		}

	// ------------------------------------------------------------

	public function search_autocomplete()
		{

		if( isset( $_POST[ 'query' ] ) )
			{

			$output = '';

			$query = Category::where( 'user_id', Auth::user()->id )
							->where( 'name', 'LIKE', '%' . $_POST[ 'query' ] . '%' )
							->get();

			$output = '<ul class="list-unstyled">';

			if( $query->count() > 0 )
				{

				foreach( $query as $q )
					{

					$output .= '<li>' . $q->name . '</li>';

					}

				}

			$output .= '</ul>';

			echo $output;

			}

		}

	}
