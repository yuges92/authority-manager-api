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
            "group_id"=>$this->product_id,
            "name"=>$this->title,
            "description"=>$this->description,
            "image"=> $this->getImageLink(),
          ];
    }
}
