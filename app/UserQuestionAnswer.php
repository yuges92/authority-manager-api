<?php

namespace App;


use App\QuestionAnswerIdea;
use App\QuestionAnswerDisclaimer;
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

  public function questionAnswerIdeas()
  {
    $questionAnswer = QuestionAnswerIdea::with('idea')->where('questionid', $this->question_id)
      ->where('answerid', $this->answer_id)
      ->get()->flatten();

    return $questionAnswer;
  }


  public function questionAnswerDisclaimers()
  {
    $questionAnswer = QuestionAnswerDisclaimer::with('disclaimer')->where('questionid', $this->question_id)
      ->where('answerid', $this->answer_id)
      ->get()->flatten();

    return $questionAnswer;
  }
}
