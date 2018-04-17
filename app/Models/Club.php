<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\Constraint\IsEmpty;

class Club extends Model {
	use CrudTrait;
	use SoftDeletes;
	/*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	protected $table = 'clubs';
	protected $primaryKey = 'id';
	protected $guarded = [ 'id' ];
	public $timestamps = true;
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

	public function events() {
		return $this->hasMany( 'App\Models\Event' );
	}
	public function image(){
	    return $this->HasMany('App\Models\ClubImage');
    }

    public function rules(){
	    return $this->hasMany('App\Models\ClubRules');
    }
    static function getMain(Club $club){
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
    static function getClosestClubs($club){
	    $count =0;
	    $clubs = Club::all();
	    foreach ($clubs as $search_club){
	        if($club->id != $search_club->id){
            $closest_clubs[$count] = (['id' => $search_club->id, 'distance' => round($club->getDistanceBetween($club, $search_club), 2)]);
            $count++;

            }
        }
        usort($closest_clubs, function ($item1, $item2) {
            return $item1['distance'] <=> $item2['distance'];
        });
        $counter = 0;
       $to_return = [];
        foreach ($closest_clubs as $club_to_delete){
            if($counter <= 3)
          array_push($to_return,$club_to_delete);
        }
        $counter++;
        return $to_return;
    }
    static function getDistanceBetween($first_club, $second_club){
	    $distance = sqrt(pow($second_club->latitude-$first_club->latitude, 2)
            + pow(cos($first_club->latitude*pi()/180)*($second_club->longitude - $first_club->longitude),2))*40075.704/360;
	    return $distance;
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
