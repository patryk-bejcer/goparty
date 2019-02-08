<?php

use App\Event;
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

		$events_images = [
		    'event-default-img.jpg'
//			'38-festival-poster-design.jpg',
//			'500_F_136841060_OEF6nECeFvYF7Md8h84Szf1z3Q3tOqYd.jpg',
//			'1527793975.jpg',
//			'depositphotos_78791182-stock-illustration-modern-music-festival-poster-design.jpg',
//			'Poster-Bohemian-Nights.jpg',
//			'front_302.jpg',
//			'Klubowa-Noc-w-Bydgoszczy-plakat-obrazek_duzy_4049971.jpg',
//			'Poster-Bohemian-Nights.jpg',
//			'topmejt-impreza-2018-plakat.jpg',
//			'Dub-Arena-plakat.jpg',
//			'Dub-Arena-plakat.jpg',
		];

		$clubsCount = \App\Club::all()->count();

		for ( $i = 1; $i <= $clubsCount - 1; $i ++ ) {

			$club = \App\Club::findOrFail( $i );

			$arr = [
				'club_id'     => $club->id,
				'user_id'     => $club->user->id,
				'title'       => $faker->name,
				'start_date'  => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months', $timezone = null),
//				'end_date'    => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'ticket_price' => '10',
                'admission'     => '18',
                'selection'     => true,
				'description' => $faker->realText( rand( 50, 300 ) ),
				'website'     => $faker->domainName,
//				'event_img'     => $events_images[rand(0, count($events_images) - 1)],
				'event_img'     => 'event-default-img.jpg'
			];

			array_push( $events, $arr );

		}

		foreach ( $events as $event ) {
			Event::create( $event );
		}
	}
}
