<?php

namespace App;

use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Backpack\CRUD\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

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
		'status',
		'activation_code',
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


	public function verifyUser() {
		return $this->hasOne( 'App\VerifyUser' );
	}

	public function favoriteMusic() {
		return $this->belongsToMany( 'App\Music', 'user_music' );
	}

	/* End of Relationships */

}
