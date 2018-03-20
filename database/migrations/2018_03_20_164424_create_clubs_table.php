<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('user_standing')->nullable();
	        $table->string ('official_name');
	        $table->string ('email');
	        $table->integer('city_id');
	        $table->string ('post_code');
	        $table->string ('street');
	        $table->string ('additional_address_info');
	        $table->string ('phone')->nullable();
	        $table->string ('website')->nullable();
	        $table->string ('facebook_url')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
