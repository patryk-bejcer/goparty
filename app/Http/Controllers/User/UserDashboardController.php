<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\City;
use App\MusicType;
use App\User;



class UserDashboardController extends Controller {

	/*  @todo Finish this methods and app user dashobard component. Finish user information edit form */

	public function __construct() {

		/* This middleware check if user is authenticated */
		$this->middleware( 'auth' );

		/* This middleware check if request user id is compare with current login user id */
		$this->middleware( 'user_dashboard_permissions',
			[ 'only' => [ 'getEditProfile' ] ] );

	}

	public function index() {
		$musicTypes = MusicType::all();
		return view( 'dashboard.index', compact('musicTypes') );
	}

	public function getEditProfile($userId){

		$user = User::findOrFail($userId);

		return $user;
	}

	public function storeEditProfile(){

	}


}
