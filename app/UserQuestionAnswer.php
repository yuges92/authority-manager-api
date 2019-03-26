<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv_DLF_livedata';
    protected $table = 'AS_user_question_answers';

    protected $fillable = ['user_topic_id', 'question_id', 'answer_id'];

    public function UserTopic()
    {
        return $this->belongsTo('App\UserTopic', 'user_topic_id');
    }

    // public function questionDisclaimers()
    // {

    //     return $this->hasMany('App\QuestionAnswerDisclaimer', 'questionid', 'question_id');

    // }

    public function questionDisclaimers()
    {
        return $this->hasMany('App\QuestionAnswerDisclaimer', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionIdeas()
    {
        return $this->hasMany('App\QuestionAnswerIdea', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionProducts()
    {
        return $this->hasMany('App\QuestionAnswerProduct', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionGroupProducts()
    {
        return $this->hasMany('App\QuestionAnswerGroup', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    // public function questionAnswerAuthorities()
    // {
    //     return $this->hasMany('App\DisclaimerAuthority', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    // }

    // public function questionAnswerProducts()
    // {
    //     $products = QuestionAnswerProduct::where('questionid', $this->question_id)
    //         ->where('answerid', $this->answer_id)
    //         ->with('product')
    //         ->get()->flatten();
    //     return $products;
    // }

    // public function questionAnswerGroups()
    // {
    //     $groups = QuestionAnswerGroup::where('questionid', $this->question_id)
    //         ->where('answerid', $this->answer_id)
    //         ->with('group')
    //         ->get()->flatten();
    //     return $groups;
    // }

    /**
     *  getQuestionDisclaimers function returns all the disclaimers for the question and answer based on condtions and authority
     *
     * @param $userAnswers Collection
     * @param [type] $authority
     * @return disclaimers
     */
    public function getQuestionDisclaimers($userAnswers, $authority)
    {

        if (!$this->questionDisclaimers->count()) {
            return false;
        }

        $disclaimers = collect();
        foreach ($this->questionDisclaimers as $questionDisclaimer) {
            if (!$questionDisclaimer->disclaimerConditions->count() || $questionDisclaimer->isConditionPassed($userAnswers)) {
                if ($questionDisclaimer->disclaimerAuthority->firstWhere('authority_id', $authority->authority_id)) {
                    // \Debugbar::warning($questionDisclaimer->disclaimerAuthority->firstWhere('authority_id', $authority->authority_id));

                    $disclaimers->push($questionDisclaimer->disclaimer);
                }
            }

        }

        return $disclaimers;

    }

    public function getQuestionIdea($userAnswers, $authority)
    {
        if (!$this->questionIdeas->count()) {
            return false;
        }

        $ideas = collect();
        foreach ($this->questionIdeas->sortBy('displayposition') as $questionIdea) {

            if (!$questionIdea->ideaConditions->count() || $questionIdea->isConditionPassed($userAnswers)) {
                if ($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id)) {
                    // \Debugbar::warning($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id));
                    $ideas->push($questionIdea->idea);
                }
            }

        }

        return $ideas;
    }

    public function getRelatedProducts($userAnswers, $authority)
    {
        if (!$this->questionProducts->count()) {
            return false;
        }

        $products = collect();
        foreach ($this->questionProducts->sortBy('order') as $questionProduct) {
            \Debugbar::error('here');

            if (!$questionProduct->productConditions->count() || $questionProduct->isConditionPassed($userAnswers)) {
                if ($questionProduct->productAuthorities->firstWhere('authority_id', $authority->authority_id)) {
                    \Debugbar::warning($questionProduct->productAuthorities->firstWhere('authority_id', $authority->authority_id));
                    $products->push($questionProduct->product);
                }
            }

        }

        return $products;
    }

    public function getRelatedGroupProducts($userAnswers, $authority)
    {
        if (!$this->questionGroupProducts->count()) {
            return false;
        }

         $groupProducts = collect();
        foreach ($this->questionGroupProducts->sortBy('order') as $questionGroupProduct) {
            
            \Debugbar::warning($questionGroupProduct->conditions);
            if (!$questionGroupProduct->conditions->count() || $questionGroupProduct->isConditionPassed($userAnswers)) {
                if ($questionGroupProduct->authorities->firstWhere('authority_id', $authority->authority_id)) {
                    // \Debugbar::warning($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id));
                    $groupProducts->push($questionGroupProduct->groupProduct);
                }
            }

        }

        return $groupProducts;
    }

}
