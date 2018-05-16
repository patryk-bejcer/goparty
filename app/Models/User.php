<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; 
    use HasRoles; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'city_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /* Admin panel users methods */

    public function sendEmailToUser($crud){
    	return  '<a href=" ' . url('/admin/user/' .$crud->id . '/send-email' ) . ' " class="btn btn-xs btn-default"><i class="fa fa-envelope-o"></i> Send email</a>';
    }

	/* End of admin panel users methods */



    /* Relationships */

	public function favoriteMusic()
	{
		return $this->belongsToMany('App\Models\MusicType','user_music_type');
	}

	public function voivodeship()
	{
		return $this->hasOne('App\Models\Voivodeship','id','voivodeship_id');
	}

	public function city()
	{
		return $this->hasOne('App\Models\City','id','city_id');
	}

	/* End of Relationships */

	public function club_percent($club){
        /*
        Do skończenia, funkcja ma zwracac wartosc od 0 do 100
        jak bardzo klub może się podobać użytkownikowi.
        Na podstawie upodobań muzycznych klienta, a muzyce którą proponuje klub.
        */

	    return rand(0, 100);
    }

}
