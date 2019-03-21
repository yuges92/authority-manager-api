<?php
namespace App;

use App\Authority;
use App\ReportQuestion;
use App\SubTopic;

class Report
{

    public $subTopic;
    public $authority;
    public $userAnswers;
    public $sectionDisclaimers = [];
    public $sectionIdeas = [];
    public $questions = [];
    public $questions2 = [];
    // public $disclaimer;

    public function __construct(SubTopic $subTopic, Authority $authority, $user)
    {
        $user = ($user instanceof AuthorityUser) ? $user->user : $user;
        $this->subTopic = $subTopic;
        $this->authority = $authority;
        $this->user = $this->authority->users()->with('topics', 'topics.questionAnswers')->where('user', $user)->first();

        $this->userAnswers = $this->user->topics->firstWhere('subTopic_id', $this->subTopic->sectionid)->questionAnswers()
            ->with([
                'questionDisclaimers.disclaimerConditions',
                'questionDisclaimers.disclaimer',
                'questionDisclaimers' => function ($query) {
                    $query->with(['disclaimerAuthority' => function ($q) {
                        $q->with('disclaimer')->where('authority_id', 5);
                    }]);
                },
            ])
            ->get();

    }

    public function getReports()
    {

    }

    /**
     * return collections of section dislamers for the authority
     *
     * @return collection
     */
    public function getSectionDisclaimers()
    {
        $sectionDisclaimers = $this->authority->sectionDisclaimers->where('sectionid', $this->subTopic->sectionid)->sortBy('order');
        return $sectionDisclaimers->load('disclaimer');
    }

    /**
     * return collections of section ideas for the given authority
     *
     * @return collection
     */
    public function getSectionIdeas()
    {
        $sectionIdeas = $this->authority->sectionIdeas->where('sectionid', $this->subTopic->sectionid)->sortBy('order');
        return $sectionIdeas->load('idea');

    }

    public function getQuestions()
    {

        $questions = collect();
        foreach ($this->userAnswers as $userAnswer) {
            // \Debugbar::warning($userAnswer->questionDisclaimers);

            // if($disclaimer=$userAnswer->getQuestionDisclaimers($this->userAnswers, $this->authority)){
            //     $questions->put('disclaimers',$disclaimer);
            // }

            $reportQuestion = new ReportQuestion($this->userAnswers, $this->authority, $userAnswer);
            $questions->push($reportQuestion);

        }
        return $questions;
    }

//     public function getQuestionDisclaimers()
    //     {
    //         \Debugbar::info($this->userAnswers);

// //    return $this->userAnswers->find(375)->questionAnswerDisclaimers(5);
    //         $questionDisclaimers = $this->userAnswers->pluck('questionDisclaimers')->flatten();
    //         $collection = $questionDisclaimers->each(function ($questionDisclaimer) {
    //             if ($questionDisclaimer->has('disclaimerConditions') && $questionDisclaimer->disclaimerConditions->isNotEmpty()) {
    //                 // \Debugbar::info($item->disclaimerConditions->groupBy('condition_questionid')->having);
    //                 $conditionPassed = false;
    //                 $checked = collect();
    //                 $disclaimerConditions = $questionDisclaimer->disclaimerConditions;
    //                 $questionDisclaimer->disclaimerConditions->each(function ($condition) use ($conditionPassed, $checked, $disclaimerConditions) {
    //                     $conditionAnswers = $disclaimerConditions->where('condition_questionid', $condition->condition_questionid)->pluck('condition_answerid');
    //                     // \Debugbar::error($conditionAnswers);

//                     if ($checked->isEmpty() || !$checked->contains($condition->condition_questionid)) {
    //                         $checked->push($condition->condition_questionid);
    //                         // \Debugbar::info('Questiond id :' . $condition->questionid . ' => Answer id: ' . $condition->answerid);
    //                         if ($v = $this->userAnswers->where('question_id', $condition->condition_questionid)->whereIn('answer_id', $conditionAnswers)) {
    //                             \Debugbar::warning('Condition Passed => ' . $condition->condition_questionid);
    //                             // \Debugbar::info($condition->condition_questionid . ' => ' . $condition->condition_answerid);
    //                             $conditionPassed = true;

//                         } else {
    //                             // \Debugbar::error($condition->condition_questionid . ' => ' . $condition->condition_answerid);
    //                             \Debugbar::error('condition Failed');

//                             $conditionPassed = false;
    //                         }
    //                     }
    //                 });
    //                 if ($conditionPassed) {
    //                     \Debugbar::info($conditionPassed);

//                 }
    //             }
    //         });
    //         return 1;

//     }

}
