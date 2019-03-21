<?php

namespace App\Http\Controllers;

use App\Authority;
use App\Report;
use App\SubTopic;
use Illuminate\Http\Request;
use \Debugbar;

class ReportController extends Controller
{

    public function show(SubTopic $subTopic)
    {
        $authority = Authority::find(5);
        $user_id = 'qmxdl2KIMdK6xQ59ZqYdqeAEivwAE961wbDCkoNa';
        $report = new Report($subTopic, $authority, $user_id);

        Debugbar::info($report->getSectionDisclaimers());
        Debugbar::info($report->getSectionIdeas());

        // dd($subTopic);
        return 1;
    }

    public function getReportForAUser(Request $request, $user_id, SubTopic $subTopic)
    {

        $authority = Authority::with('users')->find(5);
        // Debugbar::info($authority);
        $user = $authority->users()->with('topics')->where('user', $user_id)->first();
        // Debugbar::info($userTopics);

        if (!$user->topics->contains('subTopic_id', $subTopic->sectionid)) {
            echo ('No reports avaialble for the topic you provided');
        }
        
        $report = new Report($subTopic, $authority, $user);
        // Debugbar::info($report);
        // return 1;

        
        // Debugbar::info($report->getSectionDisclaimers());
        // Debugbar::info($report->getSectionIdeas());
        // Debugbar::info($report->getUserAnswers());
        // Debugbar::info($report->getquestionDisclaimers());
        Debugbar::info($report->getQuestions());

        return 1;
    }
}
// /test/reports/users/qmxdl2KIMdK6xQ59ZqYdqeAEivwAE961wbDCkoNa/subTopics/182
