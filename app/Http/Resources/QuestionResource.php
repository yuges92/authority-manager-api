<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
        "question_id"=>$this->questionid,
        "description"=>$this->sadescription,
        "subtopic_id"=>$this->sectionid,
        "image"=> $this->getImageLink(),
        "answers"=>($this->answers) ?AnswerResource::collection($this->answers) : null,
      ];
    }
}
