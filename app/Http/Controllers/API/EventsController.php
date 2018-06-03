<?php

namespace App\Http\Controllers\API;

use App\EventAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller {
	public function takePart( Request $request ) {


		$eventAttendance = EventAttendance::create( $request->all() );

		return $eventAttendance;

	}

	public function checkIfExistAttendance(Request $request){

		$exist = EventAttendance::where('user_id', $request->user_id)
		                        ->where('event_id', $request->event_id);


		if($exist){
			return response()->json('ok', 200);
		} else {
			return response()->json('no ok', 500);
		}

	}


}
