<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Paper;
use Auth;
use JavaScript;
use Jenssegers\Date\Date;

class HomeController extends Controller
    {

    public function __construct()
    {

    // $this->middleware( 'auth' );

    }

    // ------------------------------------------------------------

    public function index()
        {

        $page = 'home';

        if( Auth::check() )
            {

            $latest_papers = Paper::where( 'user_id', Auth::user()->id )->take( 10 )->orderBy( 'id', 'desc' )->get();
            $categories_array = Category::select( 'name' )->where( 'user_id', Auth::user()->id )->get()->toArray();
            $categories = Category::where( 'user_id', Auth::user()->id )->get();

            JavaScript::put( [ 'categories' => array_flatten( $categories_array ) ] );

            return view( 'home', compact( 'page', 'latest_papers', 'categories' ) );

            }

        return view( 'home', compact( 'page' ) );

         }

    }
