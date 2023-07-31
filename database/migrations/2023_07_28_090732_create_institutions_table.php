<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); 
            $table->unsignedBigInteger('category_type_id'); 
            $table->string('type'); //archive/list
            $table->string('unique_number'); //A0012080 / S0012080
            $table->string('name');
            $table->string('address');
            $table->date('registered_date');
            $table->string('registered_number');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('category_type_id')->references('id')->on('category_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institutions', function (Blueprint $table){
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['category_type_id']);
        });
        Schema::dropIfExists('institutions');
    }
}
