<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PackagesMainTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('AS_package_maintopics', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('mainTopic_id')->unsigned();;
        $table->integer('package_id')->unsigned();;
        // $table->foreign('mainTopic_id')->references('id')->on('users')->onDelete('cascade');
        // $table->foreign('subtopic_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('createdBy')->nullable();
        $table->integer('updatedBY')->nullable();
        $table->unique(['mainTopic_id','package_id']);
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

    }
}
