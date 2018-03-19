<?php

use Illuminate\Database\Seeder;

class VoivodeshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $voivodeships = [
		    'dolnośląskie',
		    'kujawsko-pomorskie',
		    'lubelskie',
		    'lubuskie',
		    'łódzkie',
		    'małopolskie',
		    'mazowieckie',
		    'opolskie',
		    'podkarpackie',
		    'podlaskie',
		    'pomorskie',
		    'śląskie',
		    'świętokrzyskie',
		    'warmińsko-mazurskie',
		    'wielkopolskie',
		    'zachodniopomorskie'
	    ];

	    foreach ( $voivodeships as $voivodeship ) {
		    \App\Models\Voivodeship::create([
			    'name' => $voivodeship
		    ]);
	    }
    }
}
