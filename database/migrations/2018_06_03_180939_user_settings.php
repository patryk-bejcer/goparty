<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->float('distance_min')->nullable();
            $table->float('distance_max')->nullable();
            $table->dateTime('event_start_date')->nullable();
            $table->float('min_club_rate')->nullable();
            $table->integer('min_attend_users')->nullable();
            $table->integer('max_attend_users')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        //
    }
}
