<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClubFacialityTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'club_facilities', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'club_id' )->unsigned();
			$table->integer( 'facilities_id' )->unsigned();
			$table->foreign( 'club_id' )
			      ->references( 'id' )
			      ->on( 'clubs' )
			      ->onDelete( 'cascade' );
			$table->foreign( 'facilities_id' )
			      ->references( 'id' )
			      ->on( 'facilities' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
