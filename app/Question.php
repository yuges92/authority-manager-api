<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $table = 'AS_question';
  protected $primaryKey = 'questionid';
  protected $imageFolder = 'statements';

  public function subTopic()
  {
    return $this->belongsTo('App\SubTopic', 'sectionid');
  }

  public function getImageLink()
  {
    return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
  }

  public function answers()
  {
    return $this->belongsToMany('App\Answer', 'AS_question_answer', 'questionid', 'answerid')->withPivot('nextquestionid');
  }



  public function isFirstQuestion()
  {

    return $this->subTopic->firstquestionid ==$this->questionid ? true: false;
  }
}
