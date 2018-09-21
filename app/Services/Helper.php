<?php

namespace App\Services;

use App\Club;
use Illuminate\Support\Facades\Auth;
use Image;

class Helper {

	public static function checkIfUserHasClubs() {
		$club = Club::where( 'user_id', '=', Auth::id() )->first();
		if ( ! is_null( $club ) ) {
			return true;
		}
	}

	//Check if user is owner minimum one club

	public static function getRandomBanner() {
		$dir = public_path() . '\img\banner';

		$files       = glob( $dir . '\*.*' );
		$random_file = asset( 'img/banner/' . rand( 1, count( $files ) ) . '.jpg' );


		return $random_file;
	}

	/* function return random banner url from img/banner */

	/**
	 *
	 * This function accepts list of all items from database and single item from foreach loop.
	 * Finally function returns whether checkbox is checked
	 *
	 * @param $allItemsFromDB
	 * @param $item
	 *
	 * @return string
	 */
	public static function checkIfCheckboxIsChecked($allItemsFromDB, $item){
		for($i = 0; $i < count($allItemsFromDB); $i++){
			if($allItemsFromDB->toArray()[$i]['id'] === $item['id']){
				return 'checked';
			}
		}
	}


}