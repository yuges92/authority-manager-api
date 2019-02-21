<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubTopic;
use App\Http\Resources\SubTopicResource;
use App\Http\Resources\SubTopicsCollection;

class SubTopicController extends ApiBaseController
{

  public function index(){
    $authorityApi=auth()->guard('api')->user();
    // $mainTopics=  ($authorityApi->authority->packages()->where('type','standard')->with('mainTopics.subTopics')->get());
    // $subTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->pluck('subTopics')->flatten()->unique('sectionid'));
    // $customSubTopics=(($authorityApi->authority->packages()->where('type','custom')->with('customSubTopics')->get()->pluck('customSubTopics')->flatten()->unique('sectionid')));
    // $mergedSubTopics=$subTopics->merge($customSubTopics)->unique('sectionid');
    //   $subTopics=$mainTopics->map(function ($mainTopic){
    //     // $subTopics=  ($mainTopic->subTopics()->with('subTopics')->get()->pluck('subTopics')->flatten()->unique('id'));
    // return $mainTopic->subTopics()->pluck('subTopics');
    //
    // });
    // $subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();
    // $subTopicsCollection= new SubTopicsCollection($subTopics);
    // $subTopics=collect($mainTopics->with('subTopics')-get()->pluck('subTopics'));

    // foreach ($mainTopics as $mainTopic) {
    //   foreach ($mainTopic->subTopics as $subTopic ) {
    //     $subTopics[]= $subTopic;
    //   }
    // $subTopicsCollection= new SubTopicsCollection($arrayName);
    // $subTopicsCollection= ($mainTopics[1])->subTopics->where('id', 7);

    $subTopics=  $authorityApi->authority->getAllSubTopics();

    $subTopicsCollection= new SubTopicsCollection($subTopics);
    if(!$subTopicsCollection){
      return $this->sendError('Not topics available to you','',403);

    }

    return $this->sendResponse($subTopicsCollection, 'Main topics retrieved successfully.');

  }



  public function show(SubTopic $subTopic){
    $authorityApi=auth()->guard('api')->user();
    $subTopics=  $authorityApi->authority->getAllSubTopics();
    if(!$subTopics->contains('sectionid', $subTopic->sectionid)){
      return $this->sendError('Not available to you','',403);
    }

    $subTopicResource= new SubTopicResource($subTopic);
    return $this->sendResponse($subTopicResource, 'Subtopic retrieved successfully.');

  }
}
