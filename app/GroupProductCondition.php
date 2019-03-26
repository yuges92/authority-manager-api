<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProductCondition extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_group_condition';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;
}
