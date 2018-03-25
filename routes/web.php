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


/* Routes for login Users */
/* Use middleware ['auth'] */
Auth::routes();
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::get('/', 'HomeController@index')->name('home');
Route::group(['namespace' => 'User','middleware' => ['auth']], function()
{
	Route::resource('/users', 'UsersController', ['except' => ['create', 'store']]);
	Route::resource('/clubs', 'ClubsController');
	Route::resource('/tags', 'TagsController');

	Route::get('/dashboard', 'UsersController@dashboard');

});

/* Routes for Owner */
/* Use middleware ['role:owner'] */
Route::group(['namespace' => 'User','middleware' => ['role:owner']], function() {
	Route::get('/dashboard/clubs', 'UsersController@clubs');
});

Route::group(['namespace' => 'Events', 'middleware' => ['role:owner']], function() {
	Route::get('/dashboard/clubs/{club}/events', 'OwnerController@index');
});

/* Routes for Administration */
Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function()
{
	CRUD::resource('tag', 'TagCrudController');
	CRUD::resource('music-types', 'MusicTypesCrudController');
	CRUD::resource('cities', 'CitiesCrudController');
	CRUD::resource('clubs', 'ClubsCrudController');
});




