<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'clubs', function ( Blueprint $table ) {

			$table->increments( 'id' )->unsigned();
			$table->integer( 'user_id' )->unsigned();
			$table->string( 'role' );
			$table->string( 'official_name' );
			$table->string( 'email' );

			/* Address Fields */
			$table->double( 'latitude' );
			$table->double( 'longitude' );
			$table->string( 'country' );
			$table->string( 'locality' );
			$table->string( 'voivodeship' );
			$table->string( 'route' );
			$table->string( 'street_number' );
			$table->string( 'postal_code' );
			$table->text( 'additional_address_info' )->nullable();
			/* End of address fields */

			/* Contact and social media fields */
			$table->string( 'phone' );
			$table->string( 'website_url' )->nullable();
			$table->string( 'facebook_url' )->nullable();
			/* End of Contact and social media fields */

			$table->string( 'club_img' )->nullable();
			$table->softDeletes();
			$table->timestamps();

			$table->foreign( 'user_id' )
			      ->references( 'id' )
			      ->on( 'users' )
			      ->onDelete( 'cascade' );

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'clubs' );
	}
}
