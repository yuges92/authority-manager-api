<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTopicResource extends JsonResource
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
        'subTopic_id'=>$this->subTopic_id,
        'name'=>($this->subTopic->name),
        'completed'=>$this->is_completed,
        'created_at'=>$this->created_at->toDateTimeString()
      ];
    }
}
