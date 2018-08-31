<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class User extends Authenticatable {
	use Notifiable;
	use CrudTrait;
	use HasRoles;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'description'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function getAvatar() {
		return $this->morphMany( 'App\Images', 'imagesable' );
	}

	/**
	 * Send the password reset notification.
	 *
	 * @param  string $token
	 *
	 * @return void
	 */
	public function sendPasswordResetNotification( $token ) {
		$this->notify( new ResetPasswordNotification( $token ) );
	}


	/* Relationships */

	public function favoriteMusic() {
		return $this->belongsToMany( 'App\MusicType', 'user_music_type' );
	}

	/* End of Relationships */

}
