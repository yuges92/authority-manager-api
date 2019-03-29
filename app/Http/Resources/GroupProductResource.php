<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupProductResource extends JsonResource
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
            "group_id"=>$this->groupid,
            "name"=>$this->sara_title,
            "description"=>$this->sara_description,
            "image"=> $this->getImageLink(),
            "link"=> $this->getLink(),
          ];
    }
}
