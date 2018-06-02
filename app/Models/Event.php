<?php

namespace App\Models;

use App\EventAttendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Event extends Model {
	use SoftDeletes;
	protected $guarded = [ 'id' ];

	protected $dates = [
	  'start_date',
        'end_date',
    ];

	public function club() {
		return $this->belongsTo( 'App\Models\Club' );
	}

	public function attendance() {
		return $this->hasMany('App\EventAttendance');
	}

	public function checkIfAttendance() {
		return EventAttendance::where('user_id', Auth::id())
		               ->where('event_id', $this->id)->exists();
	}

}
