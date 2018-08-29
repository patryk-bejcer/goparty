<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Club;
use App\User;


class ClubImage extends Model
{
    protected $table = 'club_images';
    protected $fillable = ['club_id', 'user_id', 'image_path', 'tags', 'active', 'main'];

    public function club(){
        return $this->HasOne('Club', 'id', 'club_id');
    }

    public function user(){
        return $this->HasOne('User', 'id', 'club_id');
    }

}
