<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaCondition extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_idea_condition';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;
}
