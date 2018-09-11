<?php

namespace App\Http\Controllers\Clubs;

use App\Club;
use App\Http\Controllers\Controller;

class ClubsUserController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );
	}

	public function index() {
		return view( 'site.clubs.main' );
	}

	public function show( Club $club ) {
		if ( $club->active ) {
			return view( 'site.clubs.single' )->with( 'club', $club );
		} else {
			return view( 'errors.404' );
		}

	}


}
