<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Clubs API Routing */
Route::get('nearest-clubs', 'API\ClubsController@getNearestClubs');
Route::get('clubs-archived', 'API\ClubsController@archivedClubs');
Route::post('clubs-search', 'API\ClubsController@searchResults');
Route::get('rate-club-get-sum', 'API\ClubsController@getRate');
Route::post('rate-club', 'API\ClubsController@addRate');

/* Events API Routing */
Route::get('nearest-events', 'API\EventsController@getNearestEvents');
Route::post('take-part', 'API\EventsController@takePart');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
