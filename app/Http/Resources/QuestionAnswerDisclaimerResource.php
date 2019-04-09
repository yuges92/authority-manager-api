<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAnswerDisclaimerResource extends JsonResource
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
            "title"=>$this->title,
            "description"=>$this->disclaimer,
            "image"=> $this->getImageLink(),
            "references"=> $this->references,
          ];

    }
}
