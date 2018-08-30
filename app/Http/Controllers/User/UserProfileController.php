<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller {

	/*  @todo Finish this methods and app user dashobard component. Finish user information edit form */

	public function __construct() {

		/* This middleware check if user is authenticated */
		$this->middleware( 'auth' );

		/* This middleware check if request user id is compare with current login user id */
		$this->middleware( 'user_dashboard_permissions' );

	}

	public function edit() {
		$user = Auth::user();
		return view('dashboard.users.edit', compact('user'));
	}

	public function update( Request $request ) {

		Auth::user()->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'description' => $request->description,
		]);

		return back();

	}


}
