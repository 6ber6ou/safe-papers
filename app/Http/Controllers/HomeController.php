<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paper;
use Auth;
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

            return view( 'home', compact( 'page', 'latest_papers' ) );

            }

        return view( 'home', compact( 'page' ) );

         }

    }
