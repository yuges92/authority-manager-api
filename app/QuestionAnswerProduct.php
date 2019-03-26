<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerProduct extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_product';
    // protected $primaryKey = 'pk_qap';
    // protected $autoincrement=false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id','product_id');
    }

    public function productConditions()
    {
        return $this->hasMany('App\ProductCondition', ['questionid', 'answerid', 'product_id'], ['questionid', 'answerid', 'product_id']);
    }

    public function productAuthorities()
    {
        return $this->hasMany('App\QuestionAnswerProductAuthority', ['questionid', 'answerid', 'product_id'], ['questionid', 'answerid', 'product_id']);
    }

    public function isConditionPassed($userAnswers)
    {

        if($this->productConditions->isEmpty()){
            return false;
        }

        $conditionPassed = true;
        
        if ($this->productConditions->isNotEmpty()) {
            $checked = collect();

            foreach ($this->productConditions as $condition) {
                $conditionAnswers = $this->productConditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
                // \Debugbar::warning($checked);
                if($conditionPassed){

                    if ($checked->isEmpty() || !$checked->contains($condition->condition_questionid)) {
                        $checked->push($condition->condition_questionid);
                        // \Debugbar::info('Questiond id :' . $condition->questionid . ' => Answer id: ' . $condition->answerid);
                        if ($userAnswers->where('question_id', $condition->condition_questionid)->whereIn('answer_id', $conditionAnswers)->count()) {
                            // \Debugbar::info('Condition Passed => ');
                            // \Debugbar::warning($v);
                             $conditionPassed=  true;
                        }else{
                             $conditionPassed=false;
                        } 
                        // \Debugbar::error('Condition failed => '. $condition->condition_questionid);
                    }
                }
            }
        }

        // \Debugbar::warning($conditionPassed);

        // \Debugbar::warning(' End ');

        return $conditionPassed;
    }

}
