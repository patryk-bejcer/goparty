<?php

namespace App\Http\Controllers\Clubs;

use App\Models\Club;

use App\Http\Controllers\Controller;

class ClubsUserController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clubs = Club::paginate( 25 );

		return view( 'site.clubs.index', compact( 'clubs' ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function show( $id ) {
		echo 'clubs.user.show' . $id;
	}

}
