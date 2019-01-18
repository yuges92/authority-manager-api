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
    Schema::create('AS_topics', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('description');
      $table->string('filename');
      $table->smallInteger('order');
      $table->boolean('is_used');
      $table->string('video_url')->nullable();
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
    Schema::dropIfExists('AS_topics');
  }
}
