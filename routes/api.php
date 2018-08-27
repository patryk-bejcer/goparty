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

Route::get('nearest-clubs', 'API\ClubsController@getNearestClubs');

Route::get('nearest-events', 'API\ClubsController@getNearestEvents');

Route::post('take-part', 'API\EventsController@takePart');
Route::get('take-part', 'API\EventsController@checkIfExistAttendance');

Route::post('rate-club', 'API\ClubsController@addRate');
Route::get('rate-club-get-sum', 'API\ClubsController@getRate');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
