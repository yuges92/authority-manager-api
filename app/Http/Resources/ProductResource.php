<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "product_id"=>$this->product_id,
            "name"=>$this->product_name,
            "description"=>$this->description,
            "price"=>$this->price_guide,
            "image"=> $this->image->getImageLink(),
          ];
    }
}
