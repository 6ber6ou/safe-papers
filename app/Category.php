<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
	{

	protected $fillable = [ 'name', 'slug', 'user_id' ];

	// ------------------------------------------------------

	public function papers()
		{

		return $this->hasMany( 'App\Paper' );

		}

	}
