<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
	{

    public function run()
    	{

		DB::table( 'categories' )->delete();

	    // ------------------------------------------------------------

		$site = new Category();
		$site->name = 'Médecin';
		$site->user_id = 1;
		$site->save();

	    // ------------------------------------------------------------

		$site = new Category();
		$site->name = 'Travail';
		$site->user_id = 1;
		$site->save();

	    // ------------------------------------------------------------

		$site = new Category();
		$site->name = 'Impôts';
		$site->user_id = 1;
		$site->save();

    	}

	}
