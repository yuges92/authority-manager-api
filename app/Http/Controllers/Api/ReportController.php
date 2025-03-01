<?php

namespace App\Http\Controllers\Api;

use App\Authority;
use App\Http\Resources\AuthorityUserResource;
use App\Http\Resources\AuthorityUsersCollection;
use App\Http\Resources\ReportResource;
use App\Report;
use App\SubTopic;
use Illuminate\Http\Request;

class ReportController extends ApiBaseController
{
    public function allUsers()
    {
        // $authority=AuthorityApi::where('authority_id',1088)->get();
        $authority = auth()->guard('api')->user();
        // $authority->authority()->packages;
        // $package= new PackageResource($authority->authority->packages->first());
        $userReports = $authority->authority->users()->with('topics')->get();
        return $this->sendResponse(new AuthorityUsersCollection($userReports), 'users with topics retrieved successfully.');
    }

    public function userReports(Request $request, $user_id)
    {

        // $authority=AuthorityApi::where('authority_id',1088)->get();
        $authorityAcc = auth()->guard('api')->user();
        // $authority->authority()->packages;
        // $package= new PackageResource($authority->authority->packages->first());
        $userReports = $authorityAcc->authority->users()->with('topics')->get()->firstWhere('user', $user_id);
        if (!$userReports) {
            return $this->sendError('No reports avaialble for the user you provided', '', 201);
        }
        return $this->sendResponse(new AuthorityUserResource($userReports), 'users with topics retrieved successfully.');
    }

    public function getReportForAUser(Request $request, $user_id, SubTopic $subTopic)
    {

        // // $authority=AuthorityApi::where('authority_id',1088)->get();
        // $authorityAcc = auth()->guard('api')->user();
        // // $authority->authority()->packages;
        // // $package= new PackageResource($authority->authority->packages->first());
        // $authority = $authorityAcc->authority;
        // $userReports = $authority->users()->with('topics')->get()->where('user', $user_id)->pluck('topics')->flatten();
        // $userAnswers2 = $authority;
        // if (!$userReports->contains('subTopic_id', $subTopic->sectionid)) {
        //   return $this->sendError('No reports avaialble for the topic you provided', '', 404);
        // }

        // $userAnswers = $userReports->firstWhere('subTopic_id', $subTopic->sectionid)->questionAnswers;
        // // $sectionDisclaimers= $sectionDisclaimers->pluck('disclaimer');
        // $sectionDisclaimers = $authorityAcc->authority->sectionDisclaimers->where('sectionid', $subTopic->sectionid)->flatten()->sortBy('order'); //gets section disclaimer for the authority
        // $sectionIdeas = $authorityAcc->authority->sectionIdeas->where('sectionid', $subTopic->sectionid)->sortBy('order'); //gets the section ideas for the authority
        // // $sectionIdeas=Authority::find(5)->sectionIdeas->where('sectionid','=', $subTopic->sectionid)->pluck('idea');
        // // $sectionIdeas=SectionIdea::where('sectionid', 84)->get()->pluck('');
        // // return $this->sendResponse(($sectionIdeas), 'report retrieved successfully.');
        // // return $this->sendResponse(($subTopic->sectionIdeas->pluck('authorityIdeas')->flatten()->where('authority_id','=','5')), 'report retrieved successfully.');

        // $report = new Report($subTopic, $authority, $user_id);
        // $report->subTopic = $subTopic;
        // $report->sectionDisclaimers = $sectionDisclaimers;
        // $report->sectionIdeas = $sectionIdeas;
        // $report->questions = $userAnswers;
        // $report->questions2 = $userAnswers2;

        // // $headerSectionDisclaimer=($sectionDisclaimers->where('displaytype','=','FOOTER')) ? $sectionDisclaimers->pluck('disclaimer') : '';
        // return $this->sendResponse(new ReportResource($report), 'report retrieved successfully.');

        $authority = auth()->guard('api')->user()->authority;
        $user = $authority->users()->with('topics')->where('user', $user_id)->first();

        if (!$user->topics->contains('subTopic_id', $subTopic->sectionid)) {
            return $this->sendError('No reports avaialble for the topic you provided', '', 404);
        }

        $report = new Report($subTopic, $authority, $user);

        return $this->sendResponse(new ReportResource($report), 'report retrieved successfully.');
    }
}
