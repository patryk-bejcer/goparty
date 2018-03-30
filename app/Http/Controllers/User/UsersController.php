<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

	public function dashboard() {
		return view( 'users.dashboard.index' );
	}

	public function clubs() {
		if ( Auth::user()->hasRole( 'owner' ) ) {
			$clubs = Club::where( 'user_id', '=', Auth::id() )->get();

			return view( 'users.dashboard.clubs', compact( 'clubs' ) );
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return void
	 */
	public function index() {
		$users = User::all();
		dd( $users );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return void
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function destroy( $id ) {
		//
	}

}
