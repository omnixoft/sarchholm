<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('property_id');
            $table->integer('category_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->integer('currency_id');
            $table->string('title');
            $table->string('type');
            $table->string('lat');
            $table->string('lon');
            $table->string('price');
            $table->boolean('status');
            $table->boolean('moderation_status');
            $table->boolean('is_featured');
            $table->text('description');
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
        Schema::dropIfExists('properties');
    }
}
