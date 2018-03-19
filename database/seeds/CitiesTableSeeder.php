<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $cities = [
		    '8' => 'nysa',
		    '8' => 'opole',
	    ];

	    foreach ( $cities as $id => $city ) {
		    \App\Models\City::create([
			    'voivodeship_id' => $id,
			    'name' => $city
		    ]);
	    }
    }
}
