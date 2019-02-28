<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authority;
use App\Report;
use App\Idea;
use App\SubTopic;
use App\SectionIdea;
use App\DisclaimerAuthority;
use App\Http\Resources\AuthorityUsersCollection;
use App\Http\Resources\AuthorityUserResource;
use App\Http\Resources\ReportResource;

class ReportController extends ApiBaseController
{
  public function allUsers()
  {
    // $authority=AuthorityApi::where('authority_id',1088)->get();
    $authority=auth()->guard('api')->user();
    // $authority->authority()->packages;
    // $package= new PackageResource($authority->authority->packages->first());
    $userReports=$authority->authority->users()->with('topics')->get();
    return $this->sendResponse(new AuthorityUsersCollection($userReports), 'users with topics retrieved successfully.');

  }


  public function userReports(Request $request, $user_id)
  {

    // $authority=AuthorityApi::where('authority_id',1088)->get();
    $authorityAcc=auth()->guard('api')->user();
    // $authority->authority()->packages;
    // $package= new PackageResource($authority->authority->packages->first());
    $userReports=$authorityAcc->authority->users()->with('topics')->get()->firstWhere('user',$user_id);
    if(!$userReports){
      return $this->sendError('No reports avaialble for the user you provided','',201);

    }
    return $this->sendResponse(new AuthorityUserResource($userReports), 'users with topics retrieved successfully.');


  }

  public function getReportForAUser(Request $request, $user_id, SubTopic $subTopic){

    // $authority=AuthorityApi::where('authority_id',1088)->get();
    $authorityAcc=auth()->guard('api')->user();
    // $authority->authority()->packages;
    // $package= new PackageResource($authority->authority->packages->first());
    $userReports=$authorityAcc->authority->users()->with('topics')->get()->where('user',$user_id)->pluck('topics')->flatten();
    if(!$userReports->contains('subTopic_id', $subTopic->sectionid)){
      return $this->sendError('No reports avaialble for the topic you provided','',404);
    }

    $userAnswers=$userReports->firstWhere('subTopic_id', $subTopic->sectionid)->questionAnswers;
    $sectionDisclaimers=$authorityAcc->authority->sectionDisclaimers->where('sectionid', $subTopic->sectionid)->flatten();
    // $sectionDisclaimers= $sectionDisclaimers->pluck('disclaimer');

    $sectionIdeas=$authorityAcc->authority->sectionIdeas->where('sectionid','=', $subTopic->sectionid);
    // $sectionIdeas=Authority::find(5)->sectionIdeas->where('sectionid','=', $subTopic->sectionid)->pluck('idea');
    // $sectionIdeas=SectionIdea::where('sectionid', 84)->get()->pluck('');
    // return $this->sendResponse(($sectionIdeas), 'report retrieved successfully.');
    // return $this->sendResponse(($subTopic->sectionIdeas->pluck('authorityIdeas')->flatten()->where('authority_id','=','5')), 'report retrieved successfully.');

    $report= new Report();
    $report->title=$subTopic->name;
    $report->sectionDisclaimers=$sectionDisclaimers;
    $report->sectionIdeas=$sectionIdeas;

    // $headerSectionDisclaimer=($sectionDisclaimers->where('displaytype','=','FOOTER')) ? $sectionDisclaimers->pluck('disclaimer') : '';
    return $this->sendResponse(new ReportResource($report), 'report retrieved successfully.');


  }
}
