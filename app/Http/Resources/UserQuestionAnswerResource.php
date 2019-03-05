<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Question;
use App\Answer;
use App\Product;

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
            "ideas" => QuestionAnswerIdeaResource::collection($this->questionAnswerIdeas()->sortBy('displayposition')->pluck('idea')),
            "products" => ($this->questionAnswerProducts()->sortBy('order')->pluck('product')),
            // "productss" => ( ($products=$this->questionAnswerProducts()) ? $products :''),
            // "id" => $this->question_id,
            // "groupProducts" => new QuestionResource($this->getFirstQuestion()),
            // "productsssss" => \App\Product::with('questionAnswers')->find('0108269'),

        ];
    }
}
