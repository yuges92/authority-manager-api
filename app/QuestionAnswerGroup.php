<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerGroup extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_group';
    protected $primaryKey = 'groupid';
    // protected $autoincrement=false;

    public function groupProduct()
    {
        // return $this->product_id;
        // return \App\Product::find($this->product_id);
        return $this->belongsTo('App\GroupProduct', 'groupid', 'groupid');
        // $this->belongsTo();
    }

    public function conditions()
    {
        return $this->hasMany('App\GroupProductCondition', ['questionid', 'answerid', 'groupid'], ['questionid', 'answerid', 'groupid']);
    }

    public function authorities()
    {
        return $this->hasMany('App\GroupProductAuthority', ['questionid', 'answerid', 'groupid'], ['questionid', 'answerid', 'groupid']);
    }

    public function isConditionPassed($userAnswers)
    {

        if($this->conditions->isEmpty()){
            return false;
        }

        $conditionPassed = true;
        
        if ($this->conditions->isNotEmpty()) {
            $checked = collect();

            foreach ($this->conditions as $condition) {
                $conditionAnswers = $this->conditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
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



        return $conditionPassed;
    }
}
