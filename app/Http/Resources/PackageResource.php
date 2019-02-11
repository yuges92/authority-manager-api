<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
          "package_id"=>$this->id,
           "name"=> $this->name,
           "description"=> $this->description,
           "type"=> $this->type,
           // "isActive"=> $this->isActive,
           "mainTopics"=>$this->type=='custom' ? CustomMainTopicResource::collection($this->customMainTopics()->wherePivot('package_id', $this->id)->get()->unique()):MainTopicResource::collection($this->mainTopics),
        ];
    }
}
