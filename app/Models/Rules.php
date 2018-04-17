<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $table = 'Rules';
    protected $fillable = ['name', 'image_path'];


}
