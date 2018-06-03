<?php

namespace App\Http\Controllers\Events;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function attendEvent(Request $request){
        if(DB::table('attendances')->where('user_id', $request->user_id)->where('event_id', $request->event_id)->exists()) {
            return response()->json(['message' => 'dodales juz swoje uczestnictwo']);
        } else{


        DB::table('attendances')->insert([
            'user_id' => $request->user_id,
            'event_id'=> $request->event_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $event = Event::findOrFail($request->event_id);

        }
        return response()->json(['message'=>'wezmiesz udzial w tym wydarzeniu', 'event' => 'attend']);

    }

    public function notAttendEvent(Request $request){
	     DB::table('attendances')->where('user_id', $request->user_id)->where('event_id', $request->event_id)->delete();

	     return response()->json(['message' => 'nie wezmiesz udzialu w tym wydarzeniu', 'event' => 'notattend']);
    }
}
