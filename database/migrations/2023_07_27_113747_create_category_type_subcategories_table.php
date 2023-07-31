<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTypeSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_type_subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_type_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->timestamps();

            $table->foreign('category_type_id')->references('id')->on('category_types');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_type_subcategories', function (Blueprint $table){
            $table->dropForeign(['category_type_id']);
            $table->dropForeign(['subcategory_id']);
        });
        Schema::dropIfExists('category_type_subcategories');
    }
}
