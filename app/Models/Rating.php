<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'club_id', 'rate'];

    public function User(){
        return User::findOrFail($this->user_id);
    }

    public function Club(){
        return Club::findOrFail($this->club_id);
    }

}
