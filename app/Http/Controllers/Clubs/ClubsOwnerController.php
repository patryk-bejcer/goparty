<?php

namespace App\Http\Controllers\Clubs;

use App\Club;
use App\Events\ClubCreated;
use App\Events\ClubDestroy;
use App\Http\Controllers\Controller;
use App\Images;
use App\Music;
use App\Services\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClubsOwnerController extends Controller {

	public function __construct() {

		/* Check if user has owner role*/
		$this->middleware( 'auth' );

		/* Check if user has owner role*/
		$this->middleware( 'role:owner', [ 'except' => [ 'create', 'store' ] ] );

		/* Check if user has permission (club belongs to user etc. in middleware) */
		$this->middleware( 'club_permission', [ 'except' => [ 'index', 'create', 'store', 'clubEvent' ] ] );

	}

	public function index() {
		$clubs = Club::where( 'user_id', Auth::id() )
		             ->where( 'active', true )
		             ->paginate( 10 );

		return view( 'dashboard.clubs.index', compact( 'clubs' ) );
	}

	public function create() {
		$musicTypes = Music::all();

		return view( 'dashboard.clubs.create', compact( 'musicTypes' ) );
	}

	public function store( Request $request, ImageUpload $imageUpload ) {

		$addressErrorMessage = 'Wprowadzony przez ciebie adres jest niepoprawny. Wprowadź pełny adres (nazwa ulicy/numer
                    lokalu/miasto/kraj)';

		$imageUpload->uploadNewImage( 'club', $request->file( 'image' ) );
		$imageName = $imageUpload->getImageName();

		$this->validate( $request, [
			'latitude'      => 'required',
			'longitude'     => 'required',
			'street_number' => 'required',
		], [
			'latitude.required'      => $addressErrorMessage,
			'longitude.required'     => $addressErrorMessage,
			'street_number.required' => 'Prosimy o podanie dokładniejszych danych adresowych (number lokalu)',
		] );

		$active = true;

		if ( ! Auth::user()->hasRole( 'admin' ) ) {
			$active = false;
		}


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
			'active'                  => $active
		] );


		$image = Images::create( [
			'imagesable_id'   => $club->id,
			'imagesable_type' => get_class( new Club() ),
			'title'           => $request->official_name,
			'alt_title'       => $request->official_name,
			'src'             => $imageName,
		] );

		$club->update( [
			'img_id' => $image->id,
		] );

		event( new ClubCreated( $club ) );

		return view( 'dashboard.clubs.after-create-club' );

	}

	public function edit( Club $club ) {
		$musicTypes = Music::all();

		return view( 'dashboard.clubs.edit', compact( 'club', 'musicTypes' ) );
	}

	public function update( Request $request, Club $club, ImageUpload $imageUpload ) {

		$request->validate( [
			'image' => 'mimes:jpeg,jpg,png|max:5000'
		] );

		if ( $request->image ) {

			$imageUpload->uploadNewImage( 'club', $request->file( 'image' ) );
			$imageName = $imageUpload->getImageName();

			$image = Images::updateOrCreate(
				[
					'imagesable_id'   => $club->id,
					'imagesable_type' => get_class( new Club() )
				],
				[
					'imagesable_id'   => $club->id,
					'imagesable_type' => get_class( new Club() ),
					'title'           => $club->official_name,
					'alt_title'       => $club->official_name,
					'src'             => $imageName
				]
			);
		}

		$club->update( [
			'user_id'       => Auth::id(),
			'official_name' => $request->official_name,
			'role'          => $request->role,
			'email'         => $request->email,
			'img_id'        => $image->id,
		] );


		$message = 'Klub ' . $request->official_name . ' został zaktualizowany pomyślnie.';

		return back()->with( 'flash', $message );
	}

	public function destroy( Club $club ) {
		$club->delete();
		event( new ClubDestroy() );
		$message = 'Klub  został usunięty pomyślnie.';

		return redirect()->route( 'user.edit.profile' )->with( 'flash', $message );
	}

	public function clubEvents( Club $club ) {
		$club->where( 'active', true );

		return view( 'dashboard.clubs.events', compact( 'club' ) );
	}

}
