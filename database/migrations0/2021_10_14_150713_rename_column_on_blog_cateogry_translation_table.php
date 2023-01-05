<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnOnBlogCateogryTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_category_translations', function (Blueprint $table) {
            $table->renameColumn('facility_id','category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_category_translations', function (Blueprint $table) {
            $table->renameColumn('category_id','facility_id');

        });
    }
}
