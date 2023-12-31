<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id');
            $table->string('payment_detail');
            $table->string('document');
            $table->date('payment_date');
            $table->enum('is_printed',[true,false])->default(false);
            $table->integer('print_count')->default(0);
            $table->string('added_by');
            $table->string('register_signature');
            $table->string('register_name');
            $table->string('register_designation');
            $table->string('registered_date');
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
        Schema::table('payments', function (Blueprint $table){
            $table->dropForeign(['institution_id']);
        });
        Schema::dropIfExists('payments');
    }
}
