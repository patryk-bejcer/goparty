<?php

namespace App\Http\Controllers\Clubs;

use App\Club;

use App\Http\Controllers\Controller;
use App\clubRules;
use App\Event;
use App\Music;
use Illuminate\Http\Request;

class ClubsUserController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show', 'getClubsMainPage', 'archived', 'search', 'singleClub', 'nextSingleClub', 'previousSingleClub', 'nextImage', 'prevImage' ] ] );
	}

	public function nextImage($club_id)
	{
		if(!$club = Club::where('id', '>', $club_id)->first()){
			$club = Club::first();
			$events = Event::where( 'club_id', $club->id )->get();
		}
		return view('site.clubs.single', compact('club', 'events'));
	}
	public function prevImage($club_id)
	{
		if(!$club = Club::where('id', '<', $club_id)->first()){
			$club = Club::first();
			$events = Event::where( 'club_id', $club->id )->get();
		}
		return view('site.clubs.single', compact('club', 'events'));
	}

	public function getClubsMainPage() {
		return view( 'site.clubs.main' );
	}


	public function singleClub(Request $request){

		try {
			$club = Club::findOrFail($request->get( 'id' ));

			return response()->json( $club );
		} catch (Exception $e) {
			report($e);
			return response()->json([
				'message' => 'Record not found',
			], 404);
		}

	}

	public function nextSingleClub(Request $request){

		$club = Club::where('id', '>', $request->get( 'id' ))->orderBy('id','asc')->first();


		return response()->json( $club );
	}

	public function previousSingleClub(Request $request){

		$club = Club::where('id', '<', $request->get( 'id' ))->orderBy('id','asc')->first();


		return response()->json( $club );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clubs = Club::orderBy( 'created_at', 'desc' )->paginate( 15 );

		return view( 'site.clubs.index', compact( 'clubs' ) );
//		return Club::orderBy('id', 'desc')->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function show( $id ) {

		$club = Club::findOrFail( $id );
		$club->setMusicTypes();
//		$rules = clubRules::where('club_id', $id)->get();
		$events = Event::where( 'club_id', $id )->get();
//		foreach ( $events as $event ) {
//			$event->setAttendandList();
//		}

//		var_dump($club->images);
//

		return view( 'site.clubs.single', compact( 'club', 'rules', 'events' ) );
	}


	public function searchClubs( Request $request ) {

		$city = $request->get( 'city' );

		if ( strpos( $city, ',' ) ) {
			$city = strstr( $city, ',', true );
		}

		$clubs = Club::all();

//        var_dump($city);

		if ( $city ) {

			$clubs = Club::where( 'locality', $city )->paginate( 10 );

		} else if ( $city == '' ) {
			$musicTypes = Music::paginate( 10 );
		}

		$musicTypes = Music::paginate( 10 );

//	    return response()->json($events);
		return view( 'site.clubs.search-result', compact( 'clubs', 'musicTypes' ) );
	}

}
