<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomPackageSubtopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('AS_custom_package_subtopics', function (Blueprint $table) {

      $table->increments('id');
      $table->integer('custom_package_main_topic_id')->unsigned();
      $table->integer('subTopic_id')->unsigned();
      $table->foreign('custom_package_main_topic_id')->references('id')->on('AS_custom_package_main_topics')->onDelete('cascade');
      $table->foreign('subTopic_id')->references('sectionid')->on('AS_section')->onDelete('cascade');
      $table->integer('createdBy')->nullable();
      $table->integer('updatedBY')->nullable();
      $table->unique(['custom_package_main_topic_id','subTopic_id']);
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
      Schema::dropIfExists('AS_custom_package_subtopics');

    }
}
