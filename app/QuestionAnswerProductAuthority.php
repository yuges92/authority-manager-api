<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerProductAuthority extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_product_authority';
    // protected $primaryKey = 'pkey';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id','product_id');
    }
}
