<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Resources\QuestionResource;

class QuestionController extends ApiBaseController
{


  public function show(Question $question){

    $authorityApi=auth()->guard('api')->user();
    $subTopics=  $authorityApi->authority->getAllSubTopics();

    // $mainTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    // $subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();
    if(!$subTopics->contains('sectionid', $question->subTopic->sectionid)){
      return $this->sendError('Not available to you','',403);
    }
    $questionResource= new QuestionResource($question);
    return $this->sendResponse($questionResource, 'Question retrieved successfully.');
  }



  public function nextQuestion(Request $request, Question $question){
    if($request->answer_id=='' ){
      $error='Answer Required';
      return $this->sendError('error', $error,403);
    }

    if($request->user==''){
      $error='User id/email Required';
      return $this->sendError('error', $error,403);
    }

    $authorityApi=auth()->guard('api')->user();
    $subTopics=  $authorityApi->authority->getAllSubTopics();


    // return $this->sendResponse($authorityUser, 'No more Questions Left for this subTopics.');

    if(!$subTopics->contains('sectionid', $question->subTopic->sectionid)){
      return $this->sendError('Not available to you','',403);
    }

    $authorityUser=$authorityApi->authority->users()->firstOrCreate(['user' => $request->user, 'authority_id'=>$authorityApi->authority->authority_id ]);
    $answer_id=$request->answer_id;
    if($question->isFirstQuestion()){
      $authorityUser->questionAnswers()->delete();


    }

    $authorityUser->questionAnswers()->updateOrCreate(['question_id' =>$question->questionid, 'answer_id' =>$answer_id]);
    $topicCompleted= $authorityUser->topics()->updateOrCreate(['subTopic_id' =>$question->subTopic->sectionid]);




    if($nextQuestion=$question->answers->where('answerid','=',$answer_id)->first()->getNextQuestion()){
      $topicCompleted->update(['is_completed' =>0]);

      $response['question']= new QuestionResource($nextQuestion);
      $response['isLastQuestion']=false;
      return $this->sendResponse($response, 'Question retrieved successfully.');

    }else {
      $response['isLastQuestion']=true;
      $topicCompleted->update(['is_completed' =>1]);
      return $this->sendResponse($response, 'No more Questions Left for this subTopics.');
      # code...
    }



  }

}
