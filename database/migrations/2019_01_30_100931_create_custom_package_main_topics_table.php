<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomPackageMainTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AS_custom_package_main_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('mainTopic_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('AS_packages')->onDelete('cascade');
            $table->foreign('mainTopic_id')->references('id')->on('AS_MainTopics')->onDelete('cascade');
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
        Schema::dropIfExists('AS_custom_package_main_topics');
    }
}
