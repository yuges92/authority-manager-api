<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Resources\QuestionResource;

class QuestionController extends ApiBaseController
{

  public function index()
  {

  }

  public function show(Question $question){

    $authorityApi=auth()->guard('api')->user();
    $mainTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    $subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();
    if(!$subTopics->contains('sectionid', $question->subTopic->sectionid)){
      return $this->sendError('Not available to you','',403);
    }
    $questionResource= new QuestionResource($question);
    return $this->sendResponse($questionResource, 'Question retrieved successfully.');
  }

  public function nextQuestion(Request $request, Question $question){
    if($request->answer_id==''){
      $error='Answer Required';
      return $this->sendError('error', $error,403);
    }

    $authorityApi=auth()->guard('api')->user();
    $mainTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    $subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();

    if(!$subTopics->contains('sectionid', $question->subTopic->sectionid)){
      return $this->sendError('Not available to you','',403);
    }
    $answer_id=$request->answer_id;
    $nextQuestion=$question->answers->where('answerid','=',$answer_id)->first()->getNextQuestion();
    if($nextQuestion){
      $response['question']= new QuestionResource($nextQuestion);
      $response['isLastQuestion']=false;
      return $this->sendResponse($response, 'Question retrieved successfully.');

    }else {
      $response['isLastQuestion']=true;
      return $this->sendResponse($response, 'No more Questions Left for this subTopics.');
      # code...
    }



  }

}
