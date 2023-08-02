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
            $table->enum('is_printed',[true,false])->default(false);
            $table->integer('print_count')->default(0);
            $table->string('registered_by');
            $table->string('register_signature');
            $table->string('register_name');
            $table->string('register_designation');
            $table->string('registered_date');
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
