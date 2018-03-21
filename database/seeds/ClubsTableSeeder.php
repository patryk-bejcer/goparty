<?php

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Club::create( [
			'user_id'                 => 1,
			'official_name'           => 'Krater PUB Głuchołazy',
			'role'                    => '1',
			'email'                   => 'info@krater.pl',
			'country'                 => 'Polska',
			'locality'                => 'Głuchołazy',
			'voivodeship'             => 'opolskie',
			'route'                   => 'aleja Jana Pawła II',
			'street_number'           => '26A',
			'postal_code'             => '48-340',
			'latitude'                => '50.31016899999999',
			'longitude'               => '17.382150000000024',
			'additional_address_info' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur',
			'phone'                   => '+48 454 454 454',
			'website_url'             => 'www.krater.pl',
			'facebook_url'            => 'https://www.facebook.com/KRATERPUB',
			'updated_at'              => '2018-03-21 18:51:20',
			'created_at'              => '2018-03-21 18:51:20',
		] );
	}
}
