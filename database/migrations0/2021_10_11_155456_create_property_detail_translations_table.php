<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDetailTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propertyDetail_id');
            $table->foreign('propertyDetail_id')->references('id')->on('property_details')->onDelete('cascade');
            $table->string('locale');
            $table->text('content');
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
        Schema::dropIfExists('property_detail_translations');
    }
}
