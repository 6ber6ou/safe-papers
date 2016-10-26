<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\http\Requests\UserUpdateRequest;
use App\User;

class UserController extends Controller
	{

	public function profile()
		{

        $page = 'user_profile';

        return view( 'users.profile', compact( 'page' ) );

		}

	// ------------------------------------------------------------

	public function update( UserUpdateRequest $request, $id )
		{

		$user = User::findOrFail( $id );
		$user->email = $request->input( 'email' );
		$user->password = bcrypt( $request->input( 'password' ) );
		$user->save();

		flash( 'Opération effectuée avec succès !', 'success' );

		return redirect()->route( 'home' );

		}

	}
