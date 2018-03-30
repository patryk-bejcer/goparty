<?php

namespace App\Http\Controllers\Events;

use App\Models\Event;

use App\Http\Controllers\Controller;

class EventsUserController extends Controller {

	public function index() {

	}

	public function allEvents() {
		$events = Event::paginate( 25 );

		return view( 'site.events.index', compact( 'events' ) );
	}

	public function clubEvents() {
		echo 'single.club.events';
	}

	public function singleEvent( $id ) {
		echo $id;
	}

}
