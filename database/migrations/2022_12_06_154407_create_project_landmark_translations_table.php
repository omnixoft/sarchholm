<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLandmarkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_landmark_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('landmark_id');
            $table->unsignedBigInteger('project_id');
            $table->string('locale');
            $table->string('name');
            $table->string('map_location');
            $table->string('location_minutes');
            $table->string('location_image');
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
        Schema::dropIfExists('project_landmark_translations');
    }
}
