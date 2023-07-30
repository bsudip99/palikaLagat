<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id');
            $table->string('name');
            $table->string('address');
            $table->string('license_number');
            $table->date('registration_date');
            $table->string('registration_number');
            $table->date('renewal_date');
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
        Schema::dropIfExists('institution_licenses');
    }
}
