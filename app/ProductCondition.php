<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_product_condition';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;
}
