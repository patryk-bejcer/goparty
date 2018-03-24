<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Club;
use App\Models\MusicType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ClubsController extends Controller {

	public function __construct() {
		$this->middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );
		$this->middleware( 'club_permission', [ 'except' => [ 'index', 'show', 'create', 'store' ] ] );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clubs = Club::all();

		return response( $clubs );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$musicTypes = MusicType::all();

		return view( 'clubs.create', compact(  'musicTypes' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
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

		Auth::user()->assignRole('owner');

		var_dump( $club );

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$club = Club::findOrFail( $id );



		return view('clubs.single', compact('club'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Club $club ) {
		$musicTypes = MusicType::all();
		return view('clubs.edit', compact('club','musicTypes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
