<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerProductAuthority extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_product_authority';
    // protected $primaryKey = 'pkey';
}
