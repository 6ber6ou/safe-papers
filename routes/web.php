<?php

// ****
// AUTH
// ****

Auth::routes();

Route::get( '/connexion', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm' ] );

Route::get( '/inscription', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm' ] );

// ------------------------------------------------------------

// ****
// HOME
// ****

Route::get( '/', [ 'as' => 'home', 'uses' => 'HomeController@index' ] );

// ------------------------------------------------------------
