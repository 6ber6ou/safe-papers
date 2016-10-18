<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
	{

    public function run()
	    {

		DB::table( 'users' )->delete();

	    // ------------------------------------------------------------

		$user = new User();
		$user->email = 'cyber6ou@hotmail.com';
		$user->password = bcrypt( '123456' );
		$user->save();

	    }
	}
