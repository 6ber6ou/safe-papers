<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
    {

    use AuthenticatesUsers;

    // ------------------------------------------------------------

    protected $redirectTo = '/';

    // ------------------------------------------------------------

    public function __construct()
        {

        $this->middleware( 'guest', [ 'except' => 'logout' ] );

        }

    // ------------------------------------------------------------

    protected function credentials( Request $request )
        {

        return array_merge(
            $request->only( $this->username(), 'password' ),
            [ 'confirmation_token' => NULL ] );

        }

    // ------------------------------------------------------------

    public function showLoginForm()
        {

        $page = 'login';

        return view( 'auth.login', compact( 'page' ) );

        }

    }
