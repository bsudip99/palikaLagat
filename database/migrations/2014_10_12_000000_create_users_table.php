<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('branch_id');
      $table->string('name');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password')->nullable();
      $table->string('gender')->nullable();
      $table->string('address')->nullable();
      $table->string('phone_number')->nullable();
      $table->date('dob')->nullable();
      $table->string('citizenship_no')->nullable();
      $table->string('citizenship')->nullable();
      $table->string('pp_image')->nullable();
      $table->string('reset_token')->nullable();
      $table->boolean('status')->default(true);
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
