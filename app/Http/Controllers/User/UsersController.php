<?php

namespace App\Http\Controllers\User;

use App\Models\Club;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
    public function update_image(Request $request){
        $file = $request->file('image');
        $path = 'public/users/'. $request->user_id;
        $filename = $request->file('image')->getClientOriginalName();
        $image = $filename;
        $file->move($path,$image);

        $user = User::findOrFail($request->user_id);
        if($user->image_path != null){
            unlink(public_path().'/public/users/'. $user->id .'/'. $user->image_path);

        }
        $user->image_path = $filename;
        $user->update();

        return response()->json($user);

    }

    public function remove_image(Request $request){


	    $user = User::findOrFail($request->user_id);
        $user->image_path = null;
        $user->update();
        $image = $user->getUserImage();
        return response()->json($image);
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
	public function update( Request $request, $us ) {
	    $user = User::findOrFail($us);

	     $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'city' => 'required',

        ]);

		$user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'city_id' => $request->city,

        ]);
       DB::table('user_music_type')->where('user_id', $user->id)->delete();
		foreach ($request->music_types as $music_type){
		    DB::table('user_music_type')->insert([
		       'user_id' => $user->id,
               'music_type_id' => $music_type,
            ]);
        }
        DB::table('user_settings')->where('user_id', $user->id)->delete();
        DB::table('user_settings')->insert([
            'user_id' => $user->id,
            'distance_min' => $request->distance_min,
            'distance_max' => $request->distance_max,
            'event_start_date' => $request->event_start_date,
            'min_club_rate' => $request->min_club_rate,
            'min_attend_users' => $request->min_attend_user,
            'max_attend_users' => $request->max_attend_user,


        ]);

		return back()->with(['message' => 'zaktualizowałeś swój profil']);
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
