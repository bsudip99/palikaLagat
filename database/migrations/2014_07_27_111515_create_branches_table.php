<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->string('district');
            $table->string('palika');
            $table->string('office_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('branch_head_name')->nullable();
            $table->string('branch_head_name_in_english')->nullable();
            $table->string('branch_head_position')->nullable();
            $table->string('branch_head_position_in_english')->nullable();
            $table->string('branch_head_phone')->nullable();
            $table->string('branch_head_signature')->nullable();
            $table->string('branch_stamp')->nullable();
            $table->string('branch_stamp_english')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('branches');
    }
}
