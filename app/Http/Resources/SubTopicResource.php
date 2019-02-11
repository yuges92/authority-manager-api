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
          "firstQuestion_id"=>$this->firstquestionid,
          "description"=>$this->description,
          "image"=>'https://images-dev.dlf.org.uk/sara4/dynamic/topic_images/'.$this->filename,
          "order"=>$this->order,
        ];
    }
}
