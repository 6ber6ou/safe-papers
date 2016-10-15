<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
	{

	protected $fillable = [ 'description', 'path', 'user_id', 'category_id', 'consulted_at' ];
	protected $dates = [ 'consulted_at'] ;

	// ------------------------------------------------------

	public function category()
		{

		return $this->belongsTo( 'App\Category' );

		}

	}
