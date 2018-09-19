<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$facilities = array(
			'palarnia',
			'striptiz',
			'ochrona',
			'taksówka',
			'kasyno',
			'pomieszczenia vip',
			'restauracja',
			'szatnia'
		);

		foreach ( $facilities as $facility ) {
			\App\Facilities::create( [
				'name' => $facility
			] );
		}

	}
}
