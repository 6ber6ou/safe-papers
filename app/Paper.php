<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
	{

	protected $fillable = [ 'description', 'path', 'user_id', 'category_id' ];

	}
