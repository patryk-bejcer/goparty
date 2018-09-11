<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Event extends Model {
	use SoftDeletes;
	protected $guarded = [ 'id' ];
	protected $attendendList;
	protected $dates = [
		'start_date',
		'end_date',
	];

	public function club() {
		return $this->belongsTo( 'App\Club' );
	}

	public function setAttendandList() {
		$this->attendendList = count( DB::table( 'attendances' )->where( 'event_id', $this->id )->get() );
	}

	public function checkAttendandUser( User $user ) {
		$attend = DB::table( 'attendances' )->where( 'user_id', $user->id )->where( 'event_id', $this->id )->first();
		if ( ! empty( $attend ) ) {

			return true;
		} else {

			return false;
		}
	}

	public function getAttendendList() {
		return $this->attendendList;
	}

	public function attendance() {
		return $this->hasMany( 'App\EventAttendance' );
	}

	public function checkIfAttendance() {
		return EventAttendance::where( 'user_id', Auth::id() )
		                      ->where( 'event_id', $this->id )->exists();
	}

}
