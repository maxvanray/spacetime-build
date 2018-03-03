<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('floor')->nullable();
            $table->string('description')->nullable();

            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('capacity')->nullable();

            $table->string('sunday_from')->nullable();
            $table->string('sunday_to')->nullable();
            $table->string('sunday_notes')->nullable();
            $table->string('closed_sunday')->nullable();

            $table->string('monday_from')->nullable();
            $table->string('monday_to')->nullable();
            $table->string('monday_notes')->nullable();
            $table->string('closed_monday')->nullable();

            $table->string('tuesday_from')->nullable();
            $table->string('tuesday_to')->nullable();
            $table->string('tuesday_notes')->nullable();
            $table->string('closed_tuesday')->nullable();

            $table->string('wednesday_from')->nullable();
            $table->string('wednesday_to')->nullable();
            $table->string('wednesday_notes')->nullable();
            $table->string('closed_wednesday')->nullable();

            $table->string('thursday_from')->nullable();
            $table->string('thursday_to')->nullable();
            $table->string('thursday_notes')->nullable();
            $table->string('closed_thursday')->nullable();

            $table->string('friday_from')->nullable();
            $table->string('friday_to')->nullable();
            $table->string('friday_notes')->nullable();
            $table->string('closed_friday')->nullable();

            $table->string('saturday_from')->nullable();
            $table->string('saturday_to')->nullable();
            $table->string('saturday_notes')->nullable();
            $table->string('closed_saturday')->nullable();

            $table->string('images')->nullable();

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('active')->default(1);

            $table->integer('last_edited_by')->unsigned();
            $table->foreign('last_edited_by')->references('id')->on('users');

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
        Schema::dropIfExists('locations');
    }
}
