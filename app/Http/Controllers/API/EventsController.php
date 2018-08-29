<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller {

	public function getNearestEvents( Request $request ) {

		$lat         = $request->get( 'lat' );
		$long        = $request->get( 'long' );
		$currentTime = date( 'y-m-d' );

		$events = DB::select( "SELECT events.id, title, start_date, country, official_name, event_img FROM `events`
        LEFT JOIN clubs
        ON events.club_id = clubs.id WHERE start_date > '$currentTime'
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long'))
        ASC LIMIT 16" );

		return response()
			->json( $events );
	}

}
