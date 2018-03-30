<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voivodeship extends Model {
	protected $table = 'voivodeships';
	protected $fillable = [ 'name' ];
	public $timestamps = false;
}
