<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportQuestion extends Model
{
    protected $userAnswers = [];
    public $authority;
    public $question_id;
    public $answer_id;
    public $disclaimers;
    public $ideas;
    public $relatedProducts;
    public $relatedGroupProducts;
    public $ideasAndProducts;

    public function __construct($userAnswers, $authority, $userAnswer)
    {
        $this->userAnswers = $userAnswers;
        $this->authority = $authority;
        $this->question_id = $userAnswer->question_id;
        $this->answer_id = $userAnswer->answer_id;
        $this->disclaimers = ($disclaimer = $userAnswer->getQuestionDisclaimers($this->userAnswers, $this->authority)) ? $disclaimer : false;
        $ideas = $userAnswer->getQuestionIdea($this->userAnswers, $this->authority);
        $this->ideas = ($ideas && $ideas->isNotEmpty()) ? $ideas : false;
        $products = $userAnswer->getRelatedProducts($this->userAnswers, $this->authority);
        // \Debugbar::error($products);

        $this->relatedProducts = ($products && $products->isNotEmpty()) ? $products : false;
        $groupProducts = $userAnswer->getRelatedGroupProducts($this->userAnswers, $this->authority);
        $this->relatedGroupProducts = ($groupProducts && $groupProducts->isNotEmpty()) ? $groupProducts : false;
        $this->ideasAndProducts = $userAnswer->getIdeasWithProdcuts($this->userAnswers, $this->authority);
        //    $this->ideas=$userAnswer->;
        //    $this->relatedGroupProducts=$userAnswer->;
    }

}
