<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMusicTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

//	    Schema::table('user_musics_type', function(Blueprint $table) {
//		    $table->dropForeign('user_musics_type_user_id_foreign');
//		    $table->dropColumn('user_id');
//		    $table->dropForeign('user_musics_type_musics_type_id_foreign');
//		    $table->dropColumn('musics_type_id');
//	    });

		/* This table pivoted users - music types */
		Schema::create( 'user_music', function ( Blueprint $table ) {

			$table->increments( 'id' );
			$table->integer( 'user_id' )->unsigned();
			$table->integer( 'musics_id' )->unsigned();

			/* Foreign keys */
			$table->foreign( 'user_id' )
			      ->references( 'id' )->on( 'users' )
			      ->onDelete( 'cascade' );
			$table->foreign( 'musics_id' )
			      ->references( 'id' )->on( 'musics' )
			      ->onDelete( 'cascade' );

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
//	    Schema::table('user_musics_type', function(Blueprint $table) {
//		    $table->dropForeign('user_musics_type_user_id_foreign');
//		    $table->dropColumn('user_id');
//		    $table->dropForeign('user_musics_type_musics_type_id_foreign');
//		    $table->dropColumn('musics_type_id');
//	    });

//	    Schema::disableForeignKeyConstraints();
		Schema::drop( 'users_musics_types' );
//	    Schema::enableForeignKeyConstraints();
	}
}
