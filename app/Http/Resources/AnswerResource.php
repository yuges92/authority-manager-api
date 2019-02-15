<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        "answer_id"=>$this->answerid,
        "description"=>$this->description,
        "nextQuestion"=>$this->getNextQuestionID(),
        // "isLastQuestion"=>(!$this->getNextQuestionID() ?true : false),
        // "subtopic_id"=>$this->sectionid,
        // "answers"=>$this->answers,
      ];
    }
}
