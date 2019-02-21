<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
class CreateAuthorityUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::connection('sqlsrv_DLF_livedata')->create('AS_authority_users', function (Blueprint $table) {
      $db = DB::getDatabaseName();
      $table->increments('id');
      $table->string('user');
      $table->integer('authority_id')->unsigned();
      $table->foreign('authority_id')->references('id')->on(new Expression($db.'.AS_authority'))->onDelete('cascade');
      $table->unique(['authority_id','user']);
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
    Schema::connection('sqlsrv_DLF_livedata')->dropIfExists('user_topics');
    Schema::connection('sqlsrv_DLF_livedata')->dropIfExists('AS_user_question_answers');
    Schema::connection('sqlsrv_DLF_livedata')->dropIfExists('AS_authority_users');
  }
}
