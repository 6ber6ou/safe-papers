<?php

// ****
// HOME
// ****

Route::get( '/', 'HomeController@index' );

// ------------------------------------------------------------

// ****
// AUTH
// ****

Auth::routes();
