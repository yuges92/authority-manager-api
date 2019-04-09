<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerDisclaimerCondition extends Model
{
  use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_disclaimer_condition';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;
}
