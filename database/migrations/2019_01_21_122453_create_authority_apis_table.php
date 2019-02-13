<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorityApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AS_api_authorities', function (Blueprint $table) {
          $table->increments('id');
           $table->integer('authority_id')->unique();
           $table->string('username')->unique();
           $table->string('password');
           $table->date('start_date');
           $table->date('expiry_date');
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
        Schema::dropIfExists('AS_api_authorities');
    }
}
