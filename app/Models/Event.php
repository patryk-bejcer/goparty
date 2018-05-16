<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
	protected $guarded = [ 'id' ];

	protected $dates = [
	  'start_date',
        'end_date',
    ];
	public function club() {
		return $this->belongsTo( 'App\Models\Club' );
	}

}
