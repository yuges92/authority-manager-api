<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv_DLF_livedata')->create('As_user_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authority_user_id')->unsigned();
            $table->integer('subTopic_id')->unsigned();
            $table->boolean('is_completed')->default(0);
            $table->foreign('authority_user_id')->references('id')->on('AS_authority_users')->onDelete('cascade');
            $table->unique(['authority_user_id','subTopic_id']);
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
        Schema::connection('sqlsrv_DLF_livedata')->dropIfExists('As_user_topics');
    }
}
