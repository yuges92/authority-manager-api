<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer';
    // protected $primaryKey = 'product_id';
    protected $autoincrement=false;

    public function question()
    {
        return $this->belongsTo(App\Question, 'questionid');
    }

    public function nextQuestion()
    {
        return $this->hasManyThrough(App\Question, App\QuestionAnswer,'nextquestionid');
    }

    // public function disclaimerAuthority()
    // {
      
    // }
}
