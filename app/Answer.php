<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Answer extends Model
{
  protected $table = 'AS_answer';
  protected $primaryKey = 'answerid';
  // protected $imageFolder = 'statements';

  public function questions(){
    return $this->belongsToMany('App\Question', 'AS_question_answer', 'answerid', 'questionid')->withPivot('nextquestionid');
  }


  public function getNextQuestion(){
    $nextQuestion=null;
    if($nextquestionid=$this->pivot->nextquestionid){

      // $nextQuestion=$this->questions->firstWhere('questionid','=',$nextquestionid);
      $nextQuestion=Question::find($nextquestionid);

    }
    return $nextQuestion;
  }

  public function getNextQuestionID(){
    $nextQuestion=null;
    if($nextquestionid=$this->pivot->nextquestionid){

      $nextQuestion=$nextquestionid;

    }
    return $nextQuestion;
  }

}
