<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Http\Controllers\Controller;
use App\Music;


class UserDashboardController extends Controller {

	public function __construct() {

		/* This middleware check if user is authenticated */
		$this->middleware( 'auth' );

	}

	public function index() {
		$musicTypes = Music::all();

		return view( 'dashboard.index', compact( 'musicTypes' ) );
	}


}
