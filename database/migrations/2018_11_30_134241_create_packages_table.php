<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('AS_packages', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->string('description');
      $table->enum('type',['standard', 'custom']);
      $table->boolean('isActive');
      $table->integer('createdBy')->nullable();
      $table->integer('updatedBY')->nullable();
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
    Schema::dropIfExists('AS_package_maintopics');
    Schema::dropIfExists('AS_packages');
  }
}
