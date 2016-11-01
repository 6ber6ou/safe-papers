<?php

// ****
// AUTH
// ****

Auth::routes();

Route::get( '/connexion', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm' ] );

Route::get( '/inscription', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm' ] );
Route::post( '/register', [ 'as' => 'post_register', 'uses' => 'Auth\RegisterController@register' ] );

Route::get( '/connexion', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm' ] );
Route::post( '/connexion', [ 'as' => 'post_login', 'uses' => 'Auth\LoginController@login' ] );

Route::get( '/deconnexion', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout' ] );

Route::get( '/mot-de-passe/oublie', [ 'as' => 'password_reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm' ] );
Route::post( '/mot-de-passe/oublie', [ 'as' => 'post_password_reset', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail' ] );

Route::get( '/reinitialisation/mot-de-passe/{token}', [ 'as' => 'initialize_password', 'uses' => 'Auth\ResetPasswordController@showResetForm' ] );
Route::post( '/reinitialisation/mot-de-passe', [ 'as' => 'post_initialize_password', 'uses' => 'Auth\ResetPasswordController@reset' ] );

Route::get( '/confirmation-compte/{id}/{token}', 'Auth\RegisterController@confirm' );

// ------------------------------------------------------------

// ****
// HOME
// ****

Route::get( '/', [ 'as' => 'home', 'uses' => 'HomeController@index' ] );

// ------------------------------------------------------------

// ******
// PAPERS
// ******

Route::get( '/ajouter/nouveau-papier', [ 'as' => 'add_new_paper', 'uses' => 'PaperController@add' ] );
Route::post( '/sauvegarder/nouveau-papier', [ 'as' => 'save_new_paper', 'uses' => 'PaperController@save' ] );
Route::post( '/effacer/papier/{id}', [ 'as' => 'delete_paper', 'uses' => 'PaperController@delete' ] );
Route::get( '/modifier/papier/{id}', [ 'as' => 'update_paper', 'uses' => 'PaperController@show_update' ] );
Route::post( '/modifier/papier', [ 'as' => 'post_update_paper', 'uses' => 'PaperController@update' ] );
Route::get( '/afficher/papier/{id}', [ 'as' => 'show_paper', 'uses' => 'PaperController@show' ] );
Route::get( '/recadrer/papier/{id}', [ 'as' => 'resize_paper', 'uses' => 'PaperController@resize' ] );
Route::post( '/post_recadrer/papier/{id}', [ 'as' => 'post_resize_paper', 'uses' => 'PaperController@post_resize' ] );
Route::get( '/afficher/papiers', [ 'as' => 'show_all_papers', 'uses' => 'PaperController@show_all' ] );

// ------------------------------------------------------------

// ******
// SEARCH
// ******

Route::get( '/categorie/{name}', [ 'as' => 'search_by_category', 'uses' => 'CategoriesController@search' ] );
Route::post( '/search/autocomplete', 'CategoriesController@search_autocomplete' );
Route::any( '/search/papers', [ 'as' => 'seach_papers', 'uses' => 'SearchController@find' ] );

// ------------------------------------------------------------

// *******
// PROFILE
// *******

Route::get( '/profil', [ 'as' => 'profile', 'uses' => 'UserController@profile' ] );
Route::post( '/profil/{id}', [ 'as' => 'user_update', 'uses' => 'UserController@update' ] );
