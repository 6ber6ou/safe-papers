<?php

// ********
// WELLCOME
// ********

Route::get( '/', function()
	{

    return view( 'welcome' );

	} );

// ------------------------------------------------------------

// ****
// AUTH
// ****

Auth::routes();

// ------------------------------------------------------------

// ****
// HOME
// ****

Route::get( '/home', 'HomeController@index' );
