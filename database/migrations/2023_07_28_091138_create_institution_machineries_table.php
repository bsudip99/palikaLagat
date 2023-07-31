<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionMachineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_machineries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id');
            $table->unsignedBigInteger('machinery_vehicle_type_id');
            $table->string('owner_name');
            $table->string('vehicle_type');
            $table->string('vehicle_production_company');
            $table->string('vehicle_production_year');
            $table->string('vehicle_production_country');
            $table->string('model_no');
            $table->string('chasis_no');
            $table->string('horsepower');
            $table->string('vehicle_color');
            $table->string('vehicle_seat_capacity');
            $table->string('vehicle_use');
            $table->string('vehicle_license_area');
            $table->string('vehicle_insurance_company');
            $table->string('vehicle_insurance_registered_date');
            $table->string('company_vehicle_registered_date');
            $table->timestamps();

            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('machinery_vehicle_type_id')->references('id')->on('machinery_vehicle_types');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('institution_machineries', function (Blueprint $table){
            $table->dropForeign(['institution_id']);
        });
        Schema::dropIfExists('institution_machineries');
    }
}
