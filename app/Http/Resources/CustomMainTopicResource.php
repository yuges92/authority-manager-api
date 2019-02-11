<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomMaintopicResource extends JsonResource
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
          "mainTopic_id"=>$this->id,
          "name"=>$this->name,
          "description"=>$this->description,
          "filename"=>$this->filename,
          "order"=>$this->order,
          "subTopics"=>SubTopicResource::collection($this->customSubTopics),
        ];
    }
}
