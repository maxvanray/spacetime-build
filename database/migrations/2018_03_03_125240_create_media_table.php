<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename')->nullable();
            $table->string('filename_original')->nullable();
            $table->string('location')->nullable();
            $table->string('name')->nullable();
            $table->string('categories')->nullable();
            $table->text('description')->nullable();
            $table->string('mime')->nullable();
            $table->boolean('active')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('media');
    }
}
