<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
class clubRules extends Model
{
    protected $table = 'ClubRules';
    protected $fillable = ['club_id', 'rule_id'];

    public function club(){
        return $this->belongsTo('App\Models\Club');
    }

}
