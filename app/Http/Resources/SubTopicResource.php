<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubTopicResource extends JsonResource
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
          "subTopic_id"=>$this->sectionid,
          "name"=>$this->name,
          "firstQuestion"=>new QuestionResource($this->getFirstQuestion()),
          "description"=>$this->description,
          "image"=> $this->getImageLink(),
          "order"=>$this->answers,
        ];
    }
}
