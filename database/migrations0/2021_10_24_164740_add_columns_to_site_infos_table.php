<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_infos', function (Blueprint $table) {
            $table->longText('terms_condition')->default('terms & condition')->nullable();
            $table->longText('privacy_policy')->default('privacy policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_infos', function (Blueprint $table) {
            $table->dropColumn(['terms_condition','privacy_policy']);
        });
    }
}
