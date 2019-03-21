<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerDisclaimer extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_disclaimer';
    protected $primaryKey = 'pkey';

    public function disclaimer()
    {
        return $this->belongsTo('App\Disclaimer', 'disclaimerid');
    }

    public function authorities()
    {
        return $this->belongsToMany('App\Authority', 'AS_disclaimer_authority', 'authority_id', 'disclaimerid');
    }

    public function disclaimerAuthority()
    {
        return $this->hasMany('App\DisclaimerAuthority', 'disclaimerid', 'disclaimerid');
    }

    public function disclaimerConditions()
    {
        // return QuestionAnswerDisclaimerCondition::where('questionid','=',$this->questionid)->get();
        return $this->hasMany('App\QuestionAnswerDisclaimerCondition', ['questionid', 'answerid', 'disclaimerid'], ['questionid', 'answerid', 'disclaimerid']);
    }

    // public function getConditions(){
    //    return $this->disclaimerConditions()
    //    ->where('questionid','=',$this->questionid)
    //    ->where('answerid','=',$this->answerid);
    // }

    public function isConditionPassed($userAnswers)
    {

        if($this->disclaimerConditions->isEmpty()){
            return false;
        }

        $conditionPassed = true;
        
        if ($this->disclaimerConditions->isNotEmpty()) {
            $checked = collect();

            foreach ($this->disclaimerConditions as $condition) {
                $conditionAnswers = $this->disclaimerConditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
                // \Debugbar::warning($checked);
                if($conditionPassed){

                    if ($checked->isEmpty() || !$checked->contains($condition->condition_questionid)) {
                        $checked->push($condition->condition_questionid);
                        // \Debugbar::info('Questiond id :' . $condition->questionid . ' => Answer id: ' . $condition->answerid);
                        if ($userAnswers->where('question_id', $condition->condition_questionid)->whereIn('answer_id', $conditionAnswers)->count()) {
                            // \Debugbar::info('Condition Passed => ');
                            // \Debugbar::warning($v);
                            return $conditionPassed=  true;
                        }else{
                           return  $conditionPassed=false;
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
