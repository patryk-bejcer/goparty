<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMusicTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//	    Schema::table('user_music_type', function(Blueprint $table) {
//		    $table->dropForeign('user_music_type_user_id_foreign');
//		    $table->dropColumn('user_id');
//		    $table->dropForeign('user_music_type_music_type_id_foreign');
//		    $table->dropColumn('music_type_id');
//	    });

    	/* This table pivoted users - music types */
        Schema::create('user_music_type', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('music_type_id')->unsigned();

            /* Foreign keys */
	        $table->foreign('user_id')
	              ->references('id')->on('users')
	              ->onDelete('cascade');
	        $table->foreign('music_type_id')
	              ->references('id')->on('music_types')
	              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//	    Schema::table('user_music_type', function(Blueprint $table) {
//		    $table->dropForeign('user_music_type_user_id_foreign');
//		    $table->dropColumn('user_id');
//		    $table->dropForeign('user_music_type_music_type_id_foreign');
//		    $table->dropColumn('music_type_id');
//	    });

//	    Schema::disableForeignKeyConstraints();
        Schema::drop('users_music_types');
//	    Schema::enableForeignKeyConstraints();
    }
}
