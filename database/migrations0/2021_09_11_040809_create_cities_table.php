<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->integer('country_id');
            $table->string('image')->nullable();
            $table->boolean('status');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
