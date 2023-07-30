<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineryVehicleRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machinery_vehicle_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machinery_vehicle_type_id');
            $table->string('fuel_type'); //diesel,petrol,battery
            $table->string('use'); //public,private,others
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
        Schema::dropIfExists('machinery_vehicle_registrations');
    }
}
