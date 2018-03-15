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

Route::get('/', function () {
    return view('welcome');
});

/* Routes for Users */
Route::group(['namespace' => 'User'], function()
{
	Route::resource('/tags', 'TagsController');
});

/* Routes for Administration */
Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function()
{
	CRUD::resource('tag', 'TagCrudController');
});


