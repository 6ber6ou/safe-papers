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
        $name = '';

        if( Auth::check() )
            {

            $latest_papers = Paper::where( 'user_id', Auth::user()->id )->take( 10 )->orderBy( 'id', 'desc' )->get();
            $categories = Category::where( 'user_id', Auth::user()->id )->get();

            JavaScript::put( [ 'categories' => array_flatten( $categories->toArray() ) ] );

            return view( 'home', compact( 'page', 'latest_papers', 'categories', 'name' ) );

            }

        return view( 'home', compact( 'page' ) );

         }

    }
