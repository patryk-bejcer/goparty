<?php

use App\Club;
use App\Images;
use Illuminate\Database\Seeder;


class ClubsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$faker = Faker\Factory::create();

		$clubs = [];

		for ($i=0; $i<=30; $i++){

			$arr = [
				'user_id' => rand(1,2),
				'official_name' => $faker->name,
				'role'                    => '1',
				'email'                   =>  $faker->email,
				'country'                 => $faker->country,
				'locality'                => $faker->city,
				'voivodeship'             => 'opolskie',
				'route'                   => $faker->streetName ,
				'street_number'           => $faker->buildingNumber ,
				'postal_code'             => $faker->postcode,
				'latitude'                => $faker->latitude($min = 50, $max = 51) ,
				'longitude'               => $faker->longitude($min = 16, $max = 17),
				'additional_address_info' => $faker->realText(rand(10,20)),
				'phone'                   => $faker->tollFreePhoneNumber,
				'website_url'             => $faker->domainName,
				'facebook_url'            => 'facebook.com',
				'description'            =>  $faker->text(400),
				'active'                  => true,
			];

			array_push($clubs, $arr);

		}

		foreach ($clubs as $club)
		{
			$club = Club::create( $club );

			$image = Images::create( [
				'imagesable_id'   => $club->id,
				'imagesable_type' => get_class( new Club() ),
				'title'           => $club->official_name,
				'alt_title'       => $club->official_name,
				'src'             => '1528997603.jpg',
			] );

			$club->update( [
				'img_id' => $image->id,
			] );
		}

//		exit;

//		Club::create( [
//			'user_id'                 => 1,
//			'official_name'           => 'Krater PUB Głuchołazy',
//			'role'                    => '1',
//			'email'                   => 'info@krater.pl',
//			'country'                 => 'Polska',
//			'locality'                => 'Głuchołazy',
//			'voivodeship'             => 'opolskie',
//			'route'                   => 'aleja Jana Pawła II',
//			'street_number'           => '26A',
//			'postal_code'             => '48-340',
//			'latitude'                => '50.31016899999999',
//			'longitude'               => '17.382150000000024',
//			'additional_address_info' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur',
//			'phone'                   => '+48 454 454 454',
//			'website_url'             => 'www.krater.pl',
//			'facebook_url'            => 'https://www.facebook.com/KRATERPUB',
//			'updated_at'              => '2018-03-21 18:51:20',
//			'created_at'              => '2018-03-21 18:51:20',
//		] );
	}
}
