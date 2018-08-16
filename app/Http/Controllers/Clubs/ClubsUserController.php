<?php

namespace App\Http\Controllers\Clubs;

use App\Models\Club;

use App\Http\Controllers\Controller;
use App\Models\clubRules;
use App\Models\Event;
use App\Models\MusicType;
use Illuminate\Http\Request;

class ClubsUserController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show', 'getClubsMainPage', 'archived', 'search' ] ] );
	}

	public function getClubsMainPage(){
		return view('site.clubs.main');
	}

	public function archived(){
		$clubs = Club::orderBy('id', 'desc')->paginate(9);
		return response()->json($clubs);
	}

	public function search(Request $request)
	{

		$city = $request->get('city');

		if (strpos($city, ',')) {
			$city = strstr($city, ',', true);
		}

		if ($city ) {
			$clubs = Club::where('locality', $city)->paginate(200);

		} else if($city == '' || $city == 'undefined' || $city == null){
			$clubs = Club::paginate(200);
		}


//	    return response()->json($events);
		return response()->json($clubs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clubs = Club::orderBy('created_at','desc')->paginate( 15 );

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
		$club = Club::findOrFail($id);
		$club->setMusicTypes();
//		$rules = clubRules::where('club_id', $id)->get();
        $events = Event::where('club_id', $id)->get();
        foreach ($events as $event) {
            $event->setAttendandList();
        }



		return view('site.clubs.single', compact('club', 'rules', 'events'));
	}


	public function searchClubs(Request $request)
	{

		$city = $request->get('city');

		if (strpos($city, ',')) {
			$city = strstr($city, ',', true);
		}

		$clubs = Club::all();

//        var_dump($city);

		if ($city ) {

			$clubs = Club::where('locality', $city)->paginate(10);

		} else if($city == ''){
			$musicTypes = MusicType::paginate(10);
		}

		$musicTypes = MusicType::paginate(10);

//	    return response()->json($events);
		return view('site.clubs.search-result', compact('clubs', 'musicTypes'));
	}

}
