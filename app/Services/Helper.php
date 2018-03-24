<?php

namespace App\Services;

use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class Helper {

	//Check if user is owner minimum one club
	public static function checkIfUserHasClubs(){
		$club = Club::where('user_id','=',Auth::id())->first();
		if(!is_null($club)){
			return true;
		}
	}

}