<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller {

	public function getNearestEvents( Request $request ) {

		$lat         = $request->get( 'lat' );
		$long        = $request->get( 'long' );

		$events = Event::leftJoin( 'clubs', 'events.club_id', '=', 'clubs.id' )
		               ->selectRaw( '*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [
			               $lat,
			               $long,
			               $lat
		               ] )
		               ->having( 'distance', '<', 10000 )
		               ->orderBy( 'distance' )
		               ->limit( 12 )
		               ->get();

		return response()
			->json( $events );
	}

}
