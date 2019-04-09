<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerIdea extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_idea';
    // protected $primaryKey = 'pkey';
    // protected $autoincrement=false;


    public function idea()
    {
        return $this->belongsTo('App\Idea', 'ideaid', 'ideaid');
    }

    public function ideaAuthorities()
    {
        return $this->hasMany('App\IdeaAuthority', 'ideaid', 'ideaid');
    }
    

    public function ideaConditions()
    {
        return $this->hasMany('App\IdeaCondition', ['questionid', 'answerid', 'ideaid'], ['questionid', 'answerid', 'ideaid']);
    }


    public function isConditionPassed($userAnswers)
    {

        if($this->ideaConditions->isEmpty()){
            return false;
        }

        $conditionPassed = true;
        
        if ($this->ideaConditions->isNotEmpty()) {
            $checked = collect();

            foreach ($this->ideaConditions as $condition) {
                $conditionAnswers = $this->ideaConditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
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
