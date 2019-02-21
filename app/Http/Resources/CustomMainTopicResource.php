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
          "filename"=>$this->getFile(),
          "order"=>$this->order,
          // "package_id"=>$this->pivot->package_id,
          // "subTopics"=>'',
          "subTopics"=>SubTopicResource::collection($this->customSubTopics()->wherePivot('package_id', '=',$this->pivot->package_id )->get()),
        ];
    }


    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }

}
