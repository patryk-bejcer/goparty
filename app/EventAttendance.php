<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventAttendance extends Model
{
//	use SoftDeletes;

    protected $fillable = ['event_id', 'user_id', 'status'];

    public function event(){
    	return $this->hasOne('App\Models\Event', 'id', 'event_id');
    }

}
