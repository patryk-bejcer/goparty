<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $guarded = [];
	protected $visible = [
		'src'
	];

	public function imagesable()
	{
		return $this->morphTo();
	}
}
