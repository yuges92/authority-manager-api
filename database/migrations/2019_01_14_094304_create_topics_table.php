<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('AS_MainTopics', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('description');
      $table->string('filename');
      $table->smallInteger('order');
      $table->boolean('is_used');
      $table->string('video_url')->nullable();
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
    Schema::dropIfExists('AS_MainTopics');
  }
}
