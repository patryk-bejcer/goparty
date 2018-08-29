<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Club;
use App\User;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubsController extends Controller {

	public function archivedClubs() {
		$clubs = Club::select( 'id', 'official_name', 'club_img', 'route', 'street_number', 'locality' )
		             ->orderBy( 'id', 'desc' )
		             ->paginate( 9 );

		return response()->json( $clubs );
	}

	public function searchResults( Request $request ) {

		$selectedValues = [ 'id', 'official_name', 'club_img', 'route', 'street_number', 'locality' ];
		$city           = $request->get( 'city' );

		if ( strpos( $city, ',' ) ) {
			$city = strstr( $city, ',', true );
		}

		if ( $city ) {
			$clubs = Club::select( $selectedValues )
			             ->where( 'locality', $city )
			             ->paginate( 200 );

		} else if ( $city == '' || $city == 'undefined' || $city == null ) {
			$clubs = Club::select( $selectedValues )
			             ->paginate( 200 );
		}

		return response()->json( $clubs );
	}

	public function getNearestClubs( Request $request ) {
		$lat  = $request->get( 'lat' );
		$long = $request->get( 'long' );

		$clubs = DB::select( "SELECT *
        FROM clubs WHERE deleted_at IS NULL
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long')) 
        ASC LIMIT 16" );

		return response()
			->json( $clubs );
	}

	public function getRate( Request $request ) {
		$club   = Club::findOrFail( $request->input( 'club_id' ) );
		$userId = $request->input( 'user_id' );
		$clubId = $request->input( 'club_id' );
		if ( ! Rating::where( 'author_id', $userId )
		             ->where( 'ratingable_id', $clubId )
		             ->exists() ) {
			$isExist = false;
		} else {
			$isExist = true;
		}

		$rateData = [
			'avg'   => $club->avgRating,
			'count' => $club->countPositive,
			'exist' => $isExist
		];

		return response()
			->json( $rateData, 201 );
	}

	public function addRate( Request $request ) {

		$user = User::findOrFail( $request->input( 'userId' ) );
		$club = Club::findOrFail( $request->input( 'club' ) );

		$rating = $club->rating( [
			'rating' => $request->input( 'rateValue' )
		], $user );

		return response()
			->json( $rating, 201 );

	}

}
