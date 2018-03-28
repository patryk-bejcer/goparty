<?php

namespace App\Http\Controllers\Clubs;

use App\Models\City;
use App\Models\Club;
use App\Models\MusicType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ClubsOwnerController extends Controller {

	public function __construct() {
		/* Check if user has owner role*/
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );

		/* Check if user has owner role*/
		$this->middleware( 'role:owner', [ 'except' => [ 'create', 'store' ] ] );

		/* Check if user has permission (club belongs to user etc. in middleware) */
		$this->middleware( 'club_permission', [ 'except' => [ 'index', 'create', 'store' ] ] );
	}


	public function index() {
		$clubs = Club::where( 'user_id', Auth::id() )->get();

		return view( 'dashboard.clubs.index', compact( 'clubs' ) );
	}

	public function create() {
		$musicTypes = MusicType::all();

		return view( 'dashboard.clubs.create', compact( 'musicTypes' ) );
	}


	public function store( Request $request ) {
		$addressErrorMessage = 'Wprowadzony przez ciebie adres jest niepoprawny. Wprowadź pełny adres (nazwa ulicy/numer
                    lokalu/miasto/kraj)';

		$this->validate( $request, [
			'latitude'      => 'required',
			'longitude'     => 'required',
			'street_number' => 'required',
		], [
			'latitude.required'      => $addressErrorMessage,
			'longitude.required'     => $addressErrorMessage,
			'street_number.required' => 'Prosimy o podanie dokładniejszych danych adresowych (number lokalu)',
		] );

		$club = Club::create( [
			'user_id'                 => Auth::id(),
			'official_name'           => $request->official_name,
			'role'                    => $request->role,
			'email'                   => $request->email,
			'country'                 => $request->country,
			'locality'                => $request->locality,
			'voivodeship'             => $request->voivodeship,
			'route'                   => $request->route,
			'street_number'           => $request->street_number,
			'postal_code'             => '00000',
			'latitude'                => $request->latitude,
			'longitude'               => $request->longitude,
			'additional_address_info' => $request->additional_address_info,
			'phone'                   => $request->phone,
			'website_url'             => $request->website_url,
			'facebook_url'            => $request->facebook_url,
		] );

		if ( ! Auth::user()->hasRole( 'owner' ) ) {
			Auth::user()->assignRole( 'owner' );
		}

		return redirect()->route( 'home' );
	}


	public function show( $id ) {
		$club = Club::findOrFail( $id );

		return view( 'dashboard.clubs.single', compact( 'club' ) );
	}


	public function edit( Club $club ) {
		$musicTypes = MusicType::all();

		return view( 'dashboard.clubs.edit', compact( 'club', 'musicTypes' ) );
	}

	public function update( Request $request, Club $club ) {

		$club->update( [
			'user_id'                 => Auth::id(),
			'official_name'           => $request->official_name,
			'role'                    => $request->role,
			'email'                   => $request->email,
			'country'                 => $request->country,
			'locality'                => $request->locality,
			'voivodeship'             => $request->voivodeship,
			'route'                   => $request->route,
			'street_number'           => $request->street_number,
			'postal_code'             => '00000',
			'latitude'                => $request->latitude,
			'longitude'               => $request->longitude,
			'additional_address_info' => $request->additional_address_info,
			'phone'                   => $request->phone,
			'website_url'             => $request->website_url,
			'facebook_url'            => $request->facebook_url,
		] );

		return back();
	}


	public function destroy( Club $club ) {

		$club->delete();

		$clubs = Club::where( 'user_id', Auth::id() )->get();
		if($clubs == null){
			if ( Auth::user()->hasRole( 'owner' ) ) {
				Auth::user()->unsignRole( 'owner' );
			}
		}

		return redirect()->route('user-dashboard.index');
	}

	public function clubEvents( Club $club ) {
		return view( 'dashboard.clubs.events', compact( 'club' ) );
	}

}
