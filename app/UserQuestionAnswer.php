<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
  protected $connection = 'sqlsrv_DLF_livedata';
  protected $table = 'AS_user_question_answers';

  protected $fillable = ['authority_user_id', 'question_id', 'answer_id'];


  public function authorityUser()
  {
    $this->belongsTo('App\AuthorityUser', 'authority_user_id');
  }

}
