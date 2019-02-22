<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
  protected $connection = 'sqlsrv_DLF_livedata';
  protected $table = 'AS_user_question_answers';

  protected $fillable = ['user_topic_id', 'question_id', 'answer_id'];


  public function UserTopic()
  {
    $this->belongsTo('App\UserTopic', 'user_topic_id');
  }

}
