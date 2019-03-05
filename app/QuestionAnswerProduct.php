<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerProduct extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_product';
    protected $primaryKey = 'pk_qap';
    protected $autoincrement=false;

    public function product()
    {
        // return $this->product_id;
        // return \App\Product::find($this->product_id);
        return $this->belongsTo('App\Product', 'product_id','product_id');
        // $this->belongsTo();
    }
}
