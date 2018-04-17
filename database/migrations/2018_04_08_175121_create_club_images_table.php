<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id');
            $table->integer('user_id');
            $table->string('image_path');
            $table->string('tags')->nullable();
            $table->boolean('active');
            $table->boolean('main');
            $table->softDeletes();
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
        Schema::dropIfExists('club_images');
    }
}
