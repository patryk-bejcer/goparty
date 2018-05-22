<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$faker = Faker\Factory::create();

		$events = [];

		$clubsCount = \App\Models\Club::all()->count();

		for ( $i = 1; $i <= $clubsCount - 1; $i ++ ) {

			$club = \App\Models\Club::findOrFail( $i );

			$arr = [
				'club_id'     => $club->id,
				'user_id'     => $club->user->id,
				'title'       => $faker->name,
				'start_date'  => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = null),
//				'end_date'    => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'ticket_price' => '10',
                'admission'     => '18',
                'selection'     => true,
				'description' => $faker->realText( rand( 10, 20 ) ),
				'website'     => $faker->domainName,
			];

			array_push( $events, $arr );

		}

		foreach ( $events as $event ) {
			Event::create( $event );
		}
	}
}
