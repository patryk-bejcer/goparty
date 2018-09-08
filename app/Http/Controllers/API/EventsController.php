<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller {

	public function getNearestEvents( Request $request ) {

		$lat         = $request->get( 'lat' );
		$long        = $request->get( 'long' );
		$currentTime = date( 'y-m-d' );

//		$events = DB::select( "SELECT events.id, title, start_date, country, official_name, event_img FROM `events`
//        LEFT JOIN clubs
//        ON events.club_id = clubs.id WHERE start_date > '$currentTime'
//        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long'))
//        ASC LIMIT 16" );
//
//		$events = Club::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$lat, $long, $lat])
//		             ->having('distance', '<', 60)
//		             ->orderBy('distance')
//		             ->get();


		$events = Event::leftJoin( 'clubs', 'events.club_id', '=', 'clubs.id' )
		               ->selectRaw( '*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [
			               $lat,
			               $long,
			               $lat
		               ] )
		               ->having( 'distance', '<', 120 )
		               ->orderBy( 'distance' )
		               ->limit(12)
		               ->get();

		return response()
			->json( $events );
	}

}
