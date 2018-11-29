<?php

namespace App\Http\Controllers\API;

use App\Club;
use App\Http\Controllers\Controller;
use App\User;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *   basePath="/goparty/public/api",
 *   @SWG\Info(
 *     title="Clubs API",
 *     version="1.0.0"
 *   )
 * )
 */



class ClubsController extends Controller {

    /**
     * @SWG\Get(
     *   path="/clubs-archived",
     *   summary="List all clubs",
     *   operationId="getArchivedClubs",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */

	public function archivedClubs( Request $request ) {

		$lat  = $request->get( 'lat' );
		$long = $request->get( 'long' );

		$clubs = Club::selectRaw( '*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [
			$lat,
			$long,
			$lat
		] )
		             ->where( 'active', true )
		             ->orderBy( 'distance' )
		             ->paginate( 9 );

		return response()->json( $clubs );
	}

	public function searchResults( Request $request ) {

		$selectedValues = [ 'id', 'official_name', 'img_id', 'route', 'street_number', 'locality' ];
		$city           = $request->get( 'city' );

		if ( strpos( $city, ',' ) ) {
			$city = strstr( $city, ',', true );
		}

		if ( $city ) {
			$clubs = Club::select( $selectedValues )
			             ->where( 'active', true )
			             ->where( 'locality', $city )
			             ->paginate( 200 );

		} else if ( $city == '' || $city == 'undefined' || $city == null ) {
			$clubs = Club::select( $selectedValues )
			             ->where( 'active', true )
			             ->paginate( 200 );
		}

		return response()->json( $clubs );
	}

	public function getNearestClubs( Request $request ) {
		$lat  = $request->get( 'lat' );
		$long = $request->get( 'long' );


		$clubs = Club::where( 'active', true )
		             ->selectRaw( '*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [
			             $lat,
			             $long,
			             $lat
		             ] )
		             ->having( 'distance', '<', 10000 )
		             ->orderBy( 'distance' )
		             ->limit( 12 )
		             ->get();

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

	public function allClubImages( Request $request ){
		$images = Club::findOrFail( $request->input( 'club' ) )->images;
		return response()
			->json( $images, 201 );
	}

}
