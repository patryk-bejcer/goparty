<?php

namespace App\Services;

use App\Models\Club;
use Faker\Provider\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Helper {

	//Check if user is owner minimum one club
	public static function checkIfUserHasClubs(){
		$club = Club::where('user_id','=',Auth::id())->first();
		if(!is_null($club)){
			return true;
		}
	}
	/* function return random banner url from img/banner */
	public static function getRandomBanner(){
	    $dir = public_path().'\img\banner';

        $files = glob($dir.'\*.*');
        $random_file = asset('img/banner/'.rand(1,count($files)).'.jpg');


        return $random_file;
    }

}