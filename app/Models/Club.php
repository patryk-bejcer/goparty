<?php

namespace App\Models;

use App\User;
use Backpack\CRUD\CrudTrait;
use Faker\Provider\Image;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\Constraint\IsEmpty;
use Illuminate\Support\Facades\DB;

use App\Models\Rules;

class Club extends Model {
	use CrudTrait;
	use SoftDeletes;
	use Rating;
	/*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	protected $table = 'clubs';
	protected $primaryKey = 'id';
	protected $guarded = [ 'id' ];
	public $timestamps = true;
	public $music_types = [];
	protected $dates = [ 'deleted_at' ];
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	/* Remove all events of removed club */
	protected static function boot() {
		parent::boot();

		static::deleted( function ( $club ) {
			$club->events()->delete();
		} );
	}

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function user() {

		return $this->hasOne( 'App\User', 'id', 'user_id' );
	}

    public function getUser() {

        return User::findOrFail($this->user_id);
    }

	public function events() {
		return $this->hasMany( 'App\Models\Event' );
	}
//	public function image(){
//	    return $this->HasMany('App\Models\ClubImage');
//    }
//
//    public function rules(){
//	    return $this->hasMany('App\Models\ClubRules');
//    }
    static function getMain($id){
	    $club = Club::findOrFail($id);
	    $image = ClubImage::where('club_id', $club->id)->where('main', 1)->where('active', 1)->first();
	    if(empty($image)){
	        return null;
        }
	    return $image;
    }
    static function getPhotos(Club $club, $limit){
	    $images = ClubImage::where('club_id', $club->id)->where('main', '!=', 1)->where('active', 1)->limit($limit)->get();
        if($images->IsEmpty()){
            return null;
        }

	    return $images;
    }

    public function setMusicTypes(){
        $m = DB::table('club_music_type')->where('club_id', $this->id)->get();
       foreach ($m as $music_type){
           array_push($this->music_types, MusicType::findOrFail($music_type->music_type_id));
       }
    }

    static function getClosestClubs($club){
	    $count =0;
	    $clubs = Club::all();
	    $closest_clubs=[];
	    foreach ($clubs as $search_club){
	        if($club->id != $search_club->id){
            $closest_clubs[$count] = ([$search_club->toArray(), 'distance' => round($club->getDistanceBetween($club, $search_club), 2)]);
            $count++;

            }
        }
        usort($closest_clubs, function ($item1, $item2) {
            return $item1['distance'] <=> $item2['distance'];
        });
       /* Ponizsza czesc zwroci 3 najblizsze kluby $counter = 0;
        $to_return= [];
        foreach ($closest_clubs as $club_to_delete){
            if($counter < 3){
                array_push($to_return, $club_to_delete);
            }
                $counter++;
        }
        */

        return $closest_clubs;
    }
    static function getDistanceBetween($first_club, $second_club){
	    $distance = sqrt(pow($second_club->latitude-$first_club->latitude, 2)
            + pow(cos($first_club->latitude*pi()/180)*($second_club->longitude - $first_club->longitude),2))*40075.704/360;
	    return $distance;
    }

	public function rule(){
        $to_return = [];
	    $rules = DB::table('clubrules')->where('club_id', $this->id)->get();

	    foreach ($rules as $rule){
            $ru = Rules::findOrFail($rule->rule_id);

            array_push($to_return, $ru);

        }

        return $to_return;
	}

	public function getRate(User $user){
	    return Rating::where('user_id', $user->id)->where('club_id', $this->id)->first();
    }

    public function getUserPrefere($user){
	    if($this->music_types == null){
            $this->setMusicTypes();
        }
        $user_music_types = $user->getMusicTypes();
        $check = count($user_music_types);
	    foreach ($user_music_types as $u_music_type){
	        foreach ($this->music_types as $c_music_type){
	            if($u_music_type == $c_music_type ){
	                $check = $check - 1;
                }
            }
        }

        if($check == 0){
	        return true;
        } else {
	        return false;
        }
    }
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
