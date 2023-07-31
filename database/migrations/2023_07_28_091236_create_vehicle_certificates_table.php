<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_machinery_id');
            $table->timestamps();

            $table->foreign('institution_machinery_id')->references('id')->on('institution_machineries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_certificates', function (Blueprint $table){
            $table->dropForeign(['institution_machinery_id']);
        });
        Schema::dropIfExists('vehicle_certificates');
    }
}
