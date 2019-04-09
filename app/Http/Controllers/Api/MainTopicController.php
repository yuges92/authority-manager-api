<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaintopicResource;
use App\Http\Resources\CustomMaintopicResource;
use App\Http\Resources\MaintopicsCollection;
use App\Http\Resources\SubTopicResource;
use App\Http\Resources\SubTopicsCollection;
use App\Http\Resources\CustomMainTopicCollection;
use App\MainTopic;

class MainTopicController extends ApiBaseController
{


  public function index()
  {
    $authorityApi = auth()->guard('api')->user();
    $mainTopics =  MaintopicResource::collection($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    $customMainTopics = CustomMaintopicResource::collection($authorityApi->authority->packages()
      ->where('type', 'custom')
      ->with('customMainTopics')
      ->get()->pluck('customMainTopics')
      ->flatten()
      ->unique('id'));

    $allMainTopics = ($mainTopics->merge($customMainTopics))->unique('id');

    $results['mainTopics'] = $mainTopics;
    $results['customMainTopics'] = $customMainTopics;
    $results['allMainTopics'] = $allMainTopics;

    // $results['CustomChosenSubtopics']=$customMainTopics;

    return $this->sendResponse($results, 'MainTopics retrieved successfully.');
  }


  public function show(MainTopic $mainTopic)
  {
    $authorityApi = auth()->guard('api')->user();
    $mainTopics =  MaintopicResource::collection($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten());

    $customSubTopics = (($authorityApi->authority->packages()
      ->where('type', 'custom')
      ->with('customSubTopics')
      ->get()
      ->pluck('customSubTopics')
      ->flatten()
      ->where('pivot.mainTopic_id', '=', $mainTopic->id)
      ->unique('sectionid')
      ->flatten()));

    $response = [];
    if ($mainTopics->contains('id', $mainTopic->id)) {

      $response = new MaintopicResource($mainTopic);
    } elseif ($customSubTopics) {

      $mainTopicResource = (new CustomMainTopicCollection($customSubTopics));
      $response['mainTopic_id'] = $mainTopic->id;
      $response['name'] = $mainTopic->name;
      $response['description'] = $mainTopic->description;
      $response['filename'] = $mainTopic->getFile();
      $response['order'] = $mainTopic->order;
      $response['subTopics'] = SubTopicResource::collection($customSubTopics);
      // $mainTopicResource->subTopics='12121';
    } else {
      return $this->sendError('Not available to you', '', 403);
    }

    return $this->sendResponse($response, 'MainTopic retrieved successfully.');
  }
}
