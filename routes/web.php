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
/* ====== END HOME PAGE ====== */

/* ====== AUTH ====== */
Auth::routes();
Route::get( '/register', 'Auth\RegisterController@getRegister' )->name( 'register' );
/* === END AUTH === */

/* ====== USERS ====== */

Route::get('/users', 'User\UsersController@index')->name('users.index');



Route::group( [ 'namespace' => 'User', 'middleware' => [ 'auth' ] ], function () {

	Route::get( '/dashboard', 'UserProfileController@edit' )->name( 'user.dashboard.index' );
	Route::get( '/dashboard/notifications', 'UserProfileController@notifications' )->name( 'user.notifications' );
	Route::get( '/dashboard/profile/edit', 'UserProfileController@edit' )->name( 'user.edit.profile' );
	Route::put( '/dashboard/profile/edit', 'UserProfileController@update' )->name( 'user.update.profile' );
	Route::delete( '/dashboard/profile/remove-avatar', 'UserProfileController@destroyAvatar' )->name( 'user.remove.avatar' );

} );
/* ====== END USERS ====== */

/* ====== CLUBS ====== */
/* Middleware is declarate in controller!!! */
Route::namespace( 'Clubs' )->group( function () {

	/* Rotes for clubs on guest/user front end portal (for all visitors) */
	Route::resource( 'clubs', 'ClubsUserController', [ 'only' => [ 'show', 'index' ] ] );

	/* Rotes for clubs on owner dashboard panel (role: owner) */
	Route::prefix( 'dashboard' )->group( function () {
		Route::resource( 'clubs', 'ClubsOwnerController' );
		Route::get( 'clubs/{club}/club-events', 'ClubsOwnerController@clubEvents' )->name( 'club-events' );
		Route::get( 'clubs/{club}/gallery', 'ClubsOwnerController@clubGalleryManager' )->name( 'club-gallery-manager' );
		Route::post( 'clubs//gallery/upload', 'ClubsOwnerController@clubImagesUpload' )->name( 'club-images-upload' );
	} );

} );
/* ====== END CLUBS ====== */


/* ====== EVENTS ====== */
/* Middleware is declarate in controller!!! */
Route::namespace( 'Events' )->group( function () {

	Route::get( '/dashboard/attendance', 'EventsUserController@eventsAttendanceIndex' )->name('attendance.index');

	/* Rotes for events on guest/user front end portal (for all visitors) */
	Route::get( 'events', 'EventsUserController@allEvents' )->name( 'all-events' );
//	Route::get('clubs/{club}/events', 'EventsUserController@clubEvents')->name('club-events');
	Route::get( 'events/{event}', 'EventsUserController@singleEvent' )->name( 'single-event' );
	Route::post( 'events/attend', 'EventsUserController@attendEvent' )->name( 'attendEvent' );
	Route::post( 'events/notattend', 'EventsUserController@notAttendEvent' )->name( 'notAttendEvent' );


	Route::get( 'search-events', 'EventsUserController@searchEvents' );

	/* Rotes for events on owner dashboard panel (role: owner) */
	Route::prefix( 'dashboard' )->group( function () {
		Route::get( 'owner-all-events', 'EventsOwnerController@index' )->name( 'all-owner-events' );
		Route::resource( 'clubs/{club}/events', 'EventsOwnerController', [ 'except' => [ 'index' ] ] );
	} );

} );
/* ====== END OF EVENTS ====== */

/* Routes for administration panel (role: admin) - LARAVEL BACKPACK CRUD */
Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'isAdmin' ], 'namespace' => 'Admin' ], function () {
	CRUD::resource( 'music-types', 'MusicTypesCrudController' );
	CRUD::resource( 'clubs', 'ClubsCrudController' );
	CRUD::resource( 'clubs-confirm', 'ClubsConfirmCrudController' );
	Route::post( 'club-confirm', 'ClubsConfirmCrudController@confirmClub' )->name('club.confirm');
} );

Route::get( 'search/autocomplete', 'SearchController@autocomplete' );
Route::get( 'search/clubs', 'SearchController@search_clubs' );

Route::post( 'take-part', 'Events\EventsUserController@takePart' );
Route::delete( 'take-part', 'Events\EventsUserController@cancelEvent' );

Route::get( 'clubs', 'Clubs\ClubsUserController@index' );
Route::post( 'clubs-single', 'Clubs\ClubsUserController@singleClub' );
Route::post( 'clubs-single-next', 'Clubs\ClubsUserController@nextSingleClub' );
Route::post( 'clubs-single-previous', 'Clubs\ClubsUserController@previousSingleClub' );


Route::get( 'flash', function () {
	return view( 'flash' );
} );

Route::get( 'flashButton', function () {
	return back()->with( 'flash', request()->message );
} );



