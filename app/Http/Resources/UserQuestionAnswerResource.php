<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Question;
use App\Answer;
use App\Product;
use App\QuestionAnswerIdea;
use App\UserTopic;

class UserQuestionAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        // $authority_id=auth()->guard('api')->user()->authority->authority_id;
        // $userAnswers=UserTopic::where('user_topic_id',$this->user_topic_id);
        // $authority_id=5;
        return [
            // "user_topic_id" => $userAnswers,
            "id" => $this->question_id,
            "answerid" => $this->answer_id,
            "question" => Question::find($this->question_id)->sadescription,
            "answer" => Answer::find($this->answer_id)->description,
            "disclaimers" => $this->disclaimers ? QuestionAnswerDisclaimerResource::collection($this->disclaimers) : '',
            "ideas" =>  $this->ideas ? QuestionAnswerIdeaResource::collection($this->ideas) : '',
            // "disclaimers2" =>($this->disclaimers),
            // "ideas" => QuestionAnswerIdeaResource::collection($this->questionAnswerIdeas()->sortBy('displayposition')->pluck('idea')),
            // "products" => ProductResource::collection($this->questionAnswerProducts()->sortBy('order')->pluck('product')),
            "products" => $this->relatedProducts ? ProductResource::collection($this->relatedProducts) : '',
            "groupProducts" => $this->relatedGroupProducts ? GroupProductResource::collection($this->relatedGroupProducts) : '',
            // "groupProductsss" => $this->relatedGroupProducts ,

        ];
    }


}
