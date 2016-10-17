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
            $latest_viewed_papers = Paper::where( 'user_id', Auth::user()->id )->where( 'consulted_at', '!=', NULL )->take( 10 )->orderBy( 'consulted_at', 'desc' )->get();

            $categories = Category::select( 'name' )->where( 'user_id', Auth::user()->id )->get()->toArray();

            JavaScript::put( [ 'categories' => array_flatten( $categories ) ] );

            return view( 'home', compact( 'page', 'latest_papers', 'latest_viewed_papers' ) );

            }

        return view( 'home', compact( 'page' ) );

         }

    }
