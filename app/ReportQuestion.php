<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportQuestion extends Model
{
    protected $userAnswers=[];
    public $authority;
    public $question_id;
    public $answer_id;
    public $disclaimers;
    public $ideas;
    public $relatedProducts;
    public $relatedGroupProducts;
    
    public function __construct($userAnswers, $authority, $userAnswer)
    {
        $this->userAnswers=$userAnswers;
        $this->authority=$authority;
        $this->question_id=$userAnswer->question_id;
       $this->answer_id=$userAnswer->answer_id;
       $this->disclaimers=($disclaimer=$userAnswer->getQuestionDisclaimers($this->userAnswers, $this->authority)) ? $disclaimer: '';
    //    $this->ideas=$userAnswer->;
    //    $this->relatedProducts=$userAnswer->;
    //    $this->relatedGroupProducts=$userAnswer->;
    }


}
