<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_site_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('site_setting_id');
            $table->string('input');
            $table->string('type');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('site_setting_id')->references('id')->on('site_settings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_site_settings', function (Blueprint $table){
            $table->dropForeign(['category_id']);
            $table->dropForeign(['site_setting_id']);
        });
        Schema::dropIfExists('category_site_settings');
    }
}
