<?php namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Notifications\RegisteredUser;

class RegisterController extends Controller
    {

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    // ------------------------------------------------------------

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    // ------------------------------------------------------------

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {

        $this->middleware( 'guest' );

        }

    // ------------------------------------------------------------

    public function confirm( $id, $token )
        {

        $user = User::where( 'id', $id )->where( 'confirmation_token', $token )->first();

        if( $user )
            {

            $user->update( [ 'confirmation_token' => NULL ] );

            $this->guard()->login( $user );

            return redirect()->route( 'home' )->with( 'success', 'Votre compte a bien été confirmé !' );

            }
        else
            {

            return redirect()->route( 'login' )->with( 'error', 'Ce lien n\'est pas valide !' );

            }

        }

    // ------------------------------------------------------------

    public function register( Request $request )
        {

        $this->validator( $request->all() )->validate();

        event( new Registered( $user = $this->create( $request->all() ) ) );

        $user->notify( new RegisteredUser() );

        return redirect()->route( 'login' )->with( 'success', 'Votre compte a bien été créé, vous devez le confirmer grâce à l\'email que vous allez reçevoir.' );

        }


    // ------------------------------------------------------------

    public function showRegistrationForm()
        {

        $page = 'register';

        return view( 'auth.register', compact( 'page' ) );

        }

    // ------------------------------------------------------------

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
        {

        return Validator::make( $data,
            [

            'email'         =>      'required|email|max:255|unique:users',
            'password'      =>      'required|min:6|confirmed'

            ] );

        }

    // ------------------------------------------------------------

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create( array $data )
        {

        return User::create(
            [

            'email'                     =>      $data[ 'email' ],
            'password'                  =>      bcrypt( $data[ 'password' ] ),
            'confirmation_token'        =>      str_replace( '/', '', bcrypt( str_random( 16 ) ) )

            ] );

        }

    }
