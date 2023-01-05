<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInPropertyDetailTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_detail_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('propertyDetail_id')->nullable()->change();
            $table->foreign('propertyDetail_id')->references('id')->on('property_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_detail_translations', function (Blueprint $table) {
            //
        });
    }
}
