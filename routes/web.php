<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ====== HOME PAGE ====== */
Route::get( '/', 'HomeController@index' )->name( 'home' );
/* ====== END OF HOME PAGE ====== */

/* ====== AUTH ====== */
Auth::routes();
Route::get( '/register', 'Auth\RegisterController@getRegister' )->name( 'register' );
/* ====== END OF AUTH ====== */

/* ====== USERS ====== */
Route::group( [ 'namespace' => 'User', 'middleware' => [ 'auth' ] ], function () {
	/* Rotes for auth users (show other users and manage your account) */
	Route::resource( '/users', 'UsersController', [ 'except' => [ 'create', 'store' ] ] );
	/* Rotes for auth user showing dashboard panel */
	Route::get( '/dashboard', 'UserDashboardController@index' )->name( 'user-dashboard.index' );;
} );
/* ====== END OF USERS ====== */

/* ====== CLUBS ====== */
/* Rotes for clubs on guest/user front end portal (for all visitors) */
Route::group( [ 'namespace' => 'Clubs' ], function () {
	Route::resource( 'clubs', 'ClubsOwnerController', [ 'only' => [ 'index', 'show' ] ] );
} );

/* Rotes for clubs on owner dashboard panel (role: owner) */
Route::group( [ 'prefix' => 'dashboard', 'namespace' => 'Clubs', 'middleware' => [ 'role:owner' ] ], function () {
	Route::resource( 'clubs', 'ClubsOwnerController' );
} );
/* ====== END OF CLUBS ====== */

/* ====== EVENTS ====== */
/* Rotes for events on guest/user front end portal (for all visitors) */
Route::group( [ 'namespace' => 'Events', ], function () {
	Route::resource( 'events', 'EventsUserController', [ 'only' => [ 'index', 'show' ] ] );
} );

/* Rotes for events on guest/user front end portal (for all visitors) */
Route::group( [ 'prefix' => 'dashboard', 'namespace' => 'Events', 'middleware' => [ 'role:owner' ] ], function () {
	Route::resource( 'clubs/{club}/events', 'EventsOwnerController' );
} );
/* ====== END OF CLUBS ====== */

/* Routes for administration panel (role: admin) - LARAVEL BACKPACK CRUD */
Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'admin' ], 'namespace' => 'Admin' ], function () {
	CRUD::resource( 'music-types', 'MusicTypesCrudController' );
	CRUD::resource( 'cities', 'CitiesCrudController' );
	CRUD::resource( 'clubs', 'ClubsCrudController' );
} );




