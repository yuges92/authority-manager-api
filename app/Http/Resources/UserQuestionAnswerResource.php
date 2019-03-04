<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Question;
use App\Answer;

class UserQuestionAnswerResource extends JsonResource
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
            "question" => Question::find($this->question_id)->sadescription,
            "answer" => Answer::find($this->answer_id)->description,
            "disclaimers" => QuestionAnswerDisclaimerResource::collection($this->questionAnswerDisclaimers()->pluck('disclaimer')),
            "ideas" => QuestionAnswerIdeaResource::collection($this->questionAnswerIdeas()->pluck('idea')),
            // "idea" => $this->name,
            // "groupProducts" => new QuestionResource($this->getFirstQuestion()),
            // "products" => $this->description,

        ];
    }
}
