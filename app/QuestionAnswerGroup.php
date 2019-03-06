<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerGroup extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_group';
    protected $primaryKey = 'groupid';
    // protected $autoincrement=false;

    public function group()
    {
        // return $this->product_id;
        // return \App\Product::find($this->product_id);
        return $this->belongsTo('App\Group', 'groupid');
        // $this->belongsTo();
    }
}
