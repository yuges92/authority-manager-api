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
                'questionIdeas.ideaConditions',
                'questionIdeas.idea',
                'questionIdeas' => function ($query) {
                    $query->with(['ideaAuthorities' => function ($q) {
                        $q->with('idea')->where('authority_id', 5);
                    }]);
                },
                'questionProducts.productConditions',
                'questionProducts.product',
                'questionProducts' => function ($query) {
                    $query->with(['productAuthorities' => function ($q) {
                        $q->where('authority_id', 5);
                    }]);
                },
                'questionGroupProducts.conditions',
                'questionGroupProducts.groupProduct',
                'questionGroupProducts' => function ($query) {
                    $query->with(['authorities' => function ($q) {
                        $q->with('groupProduct')->where('authority_id', 5);
                    }]);
                },
            ])
            ->get();
                // \Debugbar::error($this->userAnswers);



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

            $reportQuestion = new ReportQuestion($this->userAnswers, $this->authority, $userAnswer);
            if ((empty($reportQuestion->disclaimers) || $reportQuestion->disclaimers == false)
                && (empty($reportQuestion->ideas) || ($reportQuestion->ideas == false))
                && (empty($reportQuestion->relatedProducts) || ($reportQuestion->relatedProducts == false))) {

            } else {

                $questions->push($reportQuestion);
            }

        }
        return $questions;
    }

}
