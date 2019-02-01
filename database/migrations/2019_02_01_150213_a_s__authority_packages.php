<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ASAuthorityPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('AS_authority_packages', function (Blueprint $table) {

      $table->increments('id');
      $table->integer('authority_id')->unsigned();
      $table->integer('package_id')->unsigned();
      $table->foreign('authority_id')->references('authority_id')->on('AS_authority')->onDelete('cascade');
      $table->foreign('package_id')->references('id')->on('AS_packages')->onDelete('cascade');
      $table->integer('createdBy')->nullable();
      $table->integer('updatedBY')->nullable();
      $table->unique(['authority_id','package_id']);
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
      Schema::dropIfExists('AS_authority_packages');

    }
}
