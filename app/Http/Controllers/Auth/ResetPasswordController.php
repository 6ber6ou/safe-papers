<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
    {

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    // ------------------------------------------------------------

    public function __construct()
        {

        $this->middleware( 'guest' );

        }

    // ------------------------------------------------------------

    public function redirectPath()
        {

        return property_exists( $this, 'redirectTo' ) ? $this->redirectTo : '/ajouter/nouveau-papier';

        }

    // ------------------------------------------------------------

    public function showResetForm( Request $request, $token = NULL )
        {

        $page = 'Réinitialiser votre mot de passe';

        return view( 'auth.passwords.reset', compact( 'page' ) )
            ->with( [ 'token' => $token, 'email' => $request->email ] );

        }

    }
