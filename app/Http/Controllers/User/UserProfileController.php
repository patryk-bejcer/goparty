<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Images;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserProfileController
 * @package App\Http\Controllers\User
 */
class UserProfileController extends Controller {

	public function __construct() {

		/* This middleware check if user is authenticated */
//		$this->middleware( 'auth' );

		/* This middleware check if request user id is compare with current login user id */
//		$this->middleware( 'user_dashboard_permissions' );

	}

	public function edit() {
		$user = Auth::user();
		return view( 'dashboard.users.edit', compact( 'user' ) );
	}

	public function update( Request $request ) {

		$request->validate( [
			'first_name'  => 'required|max:30|min:3',
			'last_name'   => 'required|max:30|min:3',
			'description' => 'max:255',
			'image'       => 'mimes:jpeg,jpg,png|max:5000'
		] );

		Auth::user()->update( [
			'first_name'  => $request->first_name,
			'last_name'   => $request->last_name,
			'description' => $request->description,
		] );

		if ( $request->image ) {

			$imgTitle = $request->first_name . ' ' . $request->last_name;

			$imgName = $request->image->hashName();
			\Image::make( $request->image )->fit( 400, 400 )->save( public_path( 'uploads/users/avatars/' ) . $imgName );

			Images::updateOrCreate(
				[
					'imagesable_id'   => Auth::id(),
					'imagesable_type' => get_class( new User() )
				],
				[
					'imagesable_id'   => Auth::id(),
					'imagesable_type' => get_class( new User() ),
					'title'           => $imgTitle,
					'alt_title'       => $imgTitle,
					'src'             => $imgName
				]
			);
		}

		return back()->with( 'flash', 'Twój profil został pomyślnie zaktualizowany.' );
//		return response()->json( $request );

	}

	public function destroyAvatar() {

		Images::where( [
			'imagesable_id'   => Auth::id(),
			'imagesable_type' => get_class( new User() )
		] )->delete();

		return back()->with( 'flash', 'Twój avatar został usunięty' );

	}


}
