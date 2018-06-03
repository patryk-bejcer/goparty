<?php

namespace App\Http\Controllers\Clubs;

use App\Models\Club;

use App\Http\Controllers\Controller;
use App\Models\clubRules;
use App\Models\Event;
class ClubsUserController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clubs = Club::paginate( 25 );

		return view( 'site.clubs.index', compact( 'clubs' ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function show( $id ) {
		$club = Club::findOrFail($id);
		$club->setMusicTypes();
		$rules = clubRules::where('club_id', $id)->get();
        $events = Event::where('club_id', $id)->get();
        foreach ($events as $event) {
            $event->setAttendandList();
        }


		return view('dashboard/clubs/single', compact('club', 'rules', 'events'));
	}

}
