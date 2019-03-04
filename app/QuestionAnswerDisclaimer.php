<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerDisclaimer extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_disclaimer';
    protected $primaryKey = 'pkey';

    public function disclaimer()
    {
        return $this->belongsTo('App\Disclaimer', 'disclaimerid');
    }
}
