<?php

use Illuminate\Database\Seeder;

class MusicTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$musicTypes = array(
    		'pop', 'techno', 'rock', 'r&b', 'reggae', 'hip-hop', 'jazz'
	    );

	    foreach ( $musicTypes as $music_type ) {
		    \App\Music::create([
			    'name' => $music_type
		    ]);
    	}

    }
}
