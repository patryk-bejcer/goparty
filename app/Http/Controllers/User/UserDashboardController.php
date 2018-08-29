<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\City;
use App\MusicType;

class UserDashboardController extends Controller {
	public function index() {
        $musicTypes = MusicType::all();
//        $cities = City::all()->sortBy('name');
		return view( 'dashboard.index', compact('musicTypes') );
	}
}
