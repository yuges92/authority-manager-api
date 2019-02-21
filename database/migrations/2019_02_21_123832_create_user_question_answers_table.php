<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuestionAnswersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::connection('sqlsrv_DLF_livedata')->create('AS_user_question_answers', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('authority_user_id')->unsigned();
      $table->integer('question_id')->unsigned();
      $table->integer('answer_id')->unsigned();
      $table->unique(['authority_user_id','question_id', 'answer_id']);
      $table->foreign('authority_user_id')->references('id')->on('AS_authority_users')->onDelete('cascade');
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
    Schema::connection('sqlsrv_DLF_livedata')->dropIfExists('AS_user_question_answers');
  }
}
