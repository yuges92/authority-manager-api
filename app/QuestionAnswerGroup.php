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
        return $this->hasMany('App\GroupProductCondition', ['questionid', 'answerid', 'question_answer_group_pkey'], ['questionid', 'answerid', 'pkey']);
        // return $this->hasMany('App\GroupProductCondition', 'pkey', '');
    }

    public function authorities()
    {
        return $this->hasMany('App\GroupProductAuthority', ['questionid', 'answerid', 'groupid'], ['questionid', 'answerid', 'groupid']);
    }

    public function isConditionPassed($userAnswers)
    {

        if($this->conditions->isEmpty()){
            return true;
        }

        $conditionPassed = true;
        
        if ($this->conditions->isNotEmpty()) {
            $checked = collect();
            $this->conditions=$this->conditions->sortBy('question_id');
            \Debugbar::error($this->questionid);

            foreach ($this->conditions as $condition) {
                $conditionAnswers = $this->conditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
                if($conditionPassed){
                    
                    if ($checked->isEmpty() || !$checked->contains($condition->condition_questionid)) {
                        $checked->push($condition->condition_questionid);

                        \Debugbar::info('Group id :' . $condition->groupid . ' => Answer id: ' . $condition->condition_questionid);
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
            // \Debugbar::warning($checked);
        }



        return $conditionPassed;
    }
}
