<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users', function ( Blueprint $table ) {
			$table->increments( 'id' )->unsigned();
			$table->string( 'first_name' );
			$table->string( 'last_name' )->nullable();
			$table->string( 'email' )->unique();
			$table->string( 'password' );
			$table->tinyInteger('veried')->default(false);
			$table->text( 'description' )->nullable();
			$table->rememberToken();
			$table->timestamp( 'last_login_at' )->nullable();
			$table->timestamps();
		} );

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'users' );
	}
}
