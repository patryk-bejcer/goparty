<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\User;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ClubsController extends Controller {

//	public function __construct() {
//		$this->middleware( 'auth', [ 'only' => [  'addRate' ] ] );
//	}

	public function getRate( Request $request ) {
		$club   = Club::findOrFail( $request->input( 'club_id' ) );
		$userId = $request->input( 'user_id' );
		$clubId = $request->input( 'club_id' );
		if ( ! Rating::where( 'author_id', $userId )
		             ->where( 'ratingable_id', $clubId )
		             ->exists() && $userId) {
			$isExist = false;
		} else {
			$isExist = true;
		}

		$rateData = [
			'avg'   => $club->avgRating,
			'count' => $club->countPositive,
			'exist' => $isExist
		];

		return response()
			->json( $rateData );
	}

	public function addRate( Request $request ) {

		$user = User::findOrFail( $request->input( 'userId' ) );
		$club = Club::findOrFail( $request->input( 'club' ) );

		$rating = $club->rating( [
			'rating' => $request->input( 'rateValue' )
		], $user );

		return response()
			->json( $user );

	}

	public function getNearestClubs( Request $request ) {
		$lat  = $request->get( 'lat' );
		$long = $request->get( 'long' );

		$clubs = DB::select( "SELECT *
        FROM clubs WHERE deleted_at IS NULL
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long')) 
        ASC LIMIT 16" );

		return response()
			->json( $clubs );
	}

	public function getNearestEvents( Request $request ) {
		/*
		 * @TODO Optimize Query
		 */

		$lat         = $request->get( 'lat' );
		$long        = $request->get( 'long' );
		$currentTime = date( 'y-m-d' );

//        $events = Event::all();

//        $events = DB::table('events')
//            ->leftJoin('clubs', 'clubs.id', '=', 'events.id')
//            ->where('events.start_date', '>=', $currentTime)
//            ->orderByRaw(((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long')))
//            ->get();

		$events = DB::select( "SELECT events.id, title, start_date, country, official_name, event_img FROM `events`
        LEFT JOIN clubs
        ON events.club_id = clubs.id WHERE start_date > '$currentTime'
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long'))
        ASC LIMIT 16" );

		return response()
			->json( $events );
	}
}
