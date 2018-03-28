<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('club_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title');
	        $table->dateTime('start_date');
	        $table->dateTime('end_date');
	        $table->text('description')->nullable();
	        $table->string('website')->nullable();
	        $table->string('event_img')->nullable();
            $table->timestamps();

            /* Foreign keys */
	        $table->foreign('club_id')
	              ->references('id')
	              ->on('clubs')
	              ->onDelete('cascade');

	        $table->foreign('user_id')
	              ->references('id')
	              ->on('users')
	              ->onDelete('cascade');
	        /* End of foreign keys */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
