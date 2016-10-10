<?php namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
    {

    use Notifiable;

    // ------------------------------------------------------------

    protected $fillable = [ 'pseudo', 'email', 'password' ];
    protected $hidden = [ 'password', 'remember_token' ];

    // ------------------------------------------------------------

    public function sendPasswordResetNotification( $token )
    	{

    	$this->notify( new ResetPasswordNotification( $token ) );

    	}

    }
