<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events');

            $table->string('title')->nullable();

            $table->text('description')->nullable();

            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('all_day')->nullable();

            $table->string('background_color')->nullable();

            $table->integer('facilitator')->unsigned()->nullable();
            $table->foreign('facilitator')->references('id')->on('users');

            $table->integer('location')->unsigned()->nullable();
            $table->foreign('location')->references('id')->on('locations');

            $table->string('capacity')->nullable();

            $table->integer('price')->nullable();

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

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
        Schema::dropIfExists('calendar');
    }
}
