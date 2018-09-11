<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed user_id
 * @property mixed primaryImage
 */
class Club extends Model {
	use CrudTrait;
	use SoftDeletes;
	use Rating;
	use HasRoles;

	public $timestamps = true;
	public $music_types = [];
	protected $table = 'clubs';
	protected $primaryKey = 'id';
	protected $guarded = [ 'id' ];
	protected $dates = [ 'deleted_at' ];
	protected $appends = [ 'club_img' ];
	protected $hidden = [
		'role',
		'user_id',
		'created_at',
		'updated_at',
	];

	/* Remove all events of removed club */
	protected static function boot() {
		parent::boot();

		static::deleted( function ( $club ) {
			$club->events()->delete();
		} );
	}

	/* Getters and Setters */
	public function getClubImgAttribute() {
		return $this->primaryImage[0];
	}

	/* Relationships */
	public function user() {
		return $this->hasOne( 'App\User', 'id', 'user_id' );
	}

	public function primaryImage() {
		return $this->morphMany( 'App\Images', 'imagesable' );
	}

	public function events() {
		return $this->hasMany( 'App\Event' );
	}

}
