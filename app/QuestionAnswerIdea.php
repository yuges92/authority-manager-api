<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerIdea extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_idea';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;


    public function idea()
    {
        return $this->belongsTo('App\Idea', 'ideaid');
    }

    public function ideaAuthority()
    {
        return $this->belongsTo('App\IdeaAuthority', 'ideaid', 'ideaid');
    }


}
