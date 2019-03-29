<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaAndProducstResource extends JsonResource
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
            "idea" =>  $this->idea ? new QuestionAnswerIdeaResource($this->idea) : '',
            "products" => $this->products  && !empty($this->products)? ProductResource::collection($this->products) : '',
            "groupProducts" => $this->groupProducts ? GroupProductResource::collection($this->groupProducts) : '',
        ];
    }
}
