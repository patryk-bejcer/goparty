<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\MusicType;

class UserDashboardController extends Controller {
	public function index() {
        $musicTypes = MusicType::all();
        $cities = City::all()->sortBy('name');
		return view( 'dashboard.index', compact('cities', 'musicTypes') );
	}
}
