<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaintopicResource;
use App\Http\Resources\CustomMaintopicResource;
use App\Http\Resources\MaintopicsCollection;
use App\Http\Resources\SubTopicResource;
use App\MainTopic;

class MainTopicController extends ApiBaseController
{
  public function index()
  {
    $authorityApi=auth()->guard('api')->user();
    $mainTopics=  MaintopicResource::collection($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    $customMainTopics=  CustomMaintopicResource::collection($authorityApi->authority->packages()->with('customMainTopics')->get()->pluck('customMainTopics')->flatten()->unique('id'));
    // $allMainTopics=$mainTopics->merge($customMainTopics);
    // $allMainTopics=($mainTopics->merge($customMainTopics))->unique('id');

    $results['mainTopics']=$mainTopics;
    $results['customMainTopics']=$customMainTopics;
    // $results['CustomChosenSubtopics']=$customMainTopics;

    return $this->sendResponse($results, 'MainTopics retrieved successfully.');

  }


  public function show(MainTopic $mainTopic)
  {
    $authorityApi=auth()->guard('api')->user();
    $mainTopics=  MaintopicResource::collection($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten());
    $customMainTopics=  CustomMaintopicResource::collection($authorityApi->authority->packages()->with('customMainTopics')->get()->pluck('customMainTopics')->flatten()->unique('id'));

    if($mainTopics->contains('id', $mainTopic->id)){
      $mainTopicResource= new MaintopicResource($mainTopic);
    }
    // elseif($customMainTopics->contains('id', $mainTopic->id)){
    //   $mainTopicResource= new CustomMaintopicResource($mainTopic);
    //   // $mainTopicResource=$mainTopic->customSubTopics()->where('mainTopic_id', $mainTopic->id)->get()->first()->customPackages();
    //   // $package= $authorityApi->authority->packages()->each(function ($package) use ($mainTopic){
    //   //   if($package->cus){
    //   //
    //   //     return $package;
    //   //   }
    //   // });
    //
    // }

    return $this->sendResponse($mainTopicResource, 'MainTopic retrieved successfully.');

  }
}
