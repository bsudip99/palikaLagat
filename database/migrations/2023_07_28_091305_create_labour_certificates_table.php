<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabourCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labour_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->string('type'); //individual/company
            $table->string('name');
            $table->string('address');
            $table->string('main_branch_name');
            $table->string('main_branch_address');
            $table->string('institution_name');
            $table->string('worker_name');
            $table->string('worker_permanent_address');
            $table->string('worker_mobile_no');
            $table->string('worker_phone_no');
            $table->string('worker_guardian_name');
            $table->string('worker_guardian_address');
            $table->string('worker_guardian_phone_no');
            $table->string('worker_nationality');
            $table->string('worker_age');
            $table->string('work_level');
            $table->string('labour_type');
            $table->string('work_start_date');
            $table->string('work_end_date');
            $table->string('work_address');
            $table->timestamps();

            $table->foreign('institution_id')->references('id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labour_certificates', function (Blueprint $table){
            $table->dropForeign(['institution_id']);
        });
        Schema::dropIfExists('labour_certificates');
    }
}
