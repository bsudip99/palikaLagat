<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_site_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_setting_id');
            $table->decimal('service_charge',14,2);
            $table->decimal('penalty_charge',14,2);
            $table->timestamps();

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
        Schema::table('rate_site_settings', function (Blueprint $table){
            $table->dropForeign(['site_setting_id']);
        });
        Schema::dropIfExists('rate_site_settings');
    }
}
