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
  $mainTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
//   $subTopics=$mainTopics->map(function ($mainTopic){
//     // $subTopics=  ($mainTopic->subTopics()->with('subTopics')->get()->pluck('subTopics')->flatten()->unique('id'));
// return $mainTopic->subTopics()->pluck('subTopics');
//
// });
$subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();
$subTopicsCollection= new SubTopicsCollection($subTopics);
// $subTopics=collect($mainTopics->with('subTopics')-get()->pluck('subTopics'));

  // foreach ($mainTopics as $mainTopic) {
  //   foreach ($mainTopic->subTopics as $subTopic ) {
  //     $subTopics[]= $subTopic;
  //   }
  // $subTopicsCollection= new SubTopicsCollection($arrayName);
  // $subTopicsCollection= ($mainTopics[1])->subTopics->where('id', 7);


  return $this->sendResponse($subTopicsCollection, 'Main topics retrieved successfully.');

}

public function show(SubTopic $subTopic){
  $subTopicResource= new SubTopicResource($subTopic);
  return $this->sendResponse($subTopicResource, 'Subtopic retrieved successfully.');

}
}
