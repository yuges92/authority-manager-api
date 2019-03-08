<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Resources\QuestionResource;

class QuestionController extends ApiBaseController
{

/**
 * 
 *
 * @param Question $question
 * @return question resource
 */
  public function show(Question $question)
  {

    $authorityApi = auth()->guard('api')->user();
    $subTopics =  $authorityApi->authority->getAllSubTopics();

    // $mainTopics=  ($authorityApi->authority->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->unique('id'));
    // $subTopics=$mainTopics->pluck('subTopics')->collapse()->unique();
    if (!$subTopics->contains('sectionid', $question->subTopic->sectionid)) {
      return $this->sendError('Not available to you', '', 403);
    }
    $questionResource = new QuestionResource($question);
    return $this->sendResponse($questionResource, 'Question retrieved successfully.');
  }


/**
 *  funtion return next question if that available to the authority
 *
 * @param Request $request
 * @param Question $question
 * @return nextQuestion for the topic 
 */
  public function nextQuestion(Request $request, Question $question)
  {

    
    if ($request->answer_id == '') {
      $error = 'Answer Required';
      return $this->sendError('error', $error, 403);
    }

    if ($request->user == '') {
      $error = 'User id/email Required';
      return $this->sendError('error', $error, 403);
    }

    $authorityApi = auth()->guard('api')->user();
    $subTopics =  $authorityApi->authority->getAllSubTopics();  //gets all the subtopics for the authority from all the packages the authority linked with
    if (!$subTopics->contains('sectionid', $question->subTopic->sectionid)) {
      return $this->sendError('Not available to you', '', 403);
    }



    $authorityUser = $authorityApi->authority->users()->firstOrCreate(['user' => $request->user, 'authority_id' => $authorityApi->authority->authority_id]);// create/get user for the authority 
    $answer_id = $request->answer_id;
    if ($question->isFirstQuestion()) {
      $authorityUser->topics()->where('subTopic_id', $question->subTopic->sectionid)->delete();
    }

    $userTopic = $authorityUser->topics()->updateOrCreate(['subTopic_id' => $question->subTopic->sectionid]);
    $update = $userTopic->questionAnswers()->updateOrCreate(['question_id' => $question->questionid, 'answer_id' => $answer_id]);

    if ($nextQuestion = $question->answers->where('answerid', '=', $answer_id)->first()->getNextQuestion()) {
      $userTopic->update(['is_completed' => 0]);

      $response['question'] = new QuestionResource($nextQuestion);
      $response['completedPercentage'] = 50;
      $allQuestions = $question->subTopic->questions()->with('answers')->get()->count();
      $userAnsers = $userTopic->questionAnswers->count();
      $response['completedPercentage'] = round(($userAnsers/$allQuestions)*100);

      $response['isLastQuestion'] = false;
      return $this->sendResponse($response, 'Question retrieved successfully.');
    } else {
      $response['isLastQuestion'] = true;
      $response['completedPercentage'] = 100;
      $userTopic->update(['is_completed' => 1]);
      return $this->sendResponse($response, 'No more Questions Left for this subTopics.');
    }
  }
}
