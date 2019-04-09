<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionDisclaimerResource extends JsonResource
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
        'id'=>($this->disclaimerid),
        'title'=>($this->disclaimer->title),
        'disclaimer'=>($this->disclaimer->disclaimer),
        'reference'=>($this->disclaimer->reference),
        'displaytype'=>($this->displaytype),
        'image'=>($this->disclaimer->getImageLink()),
        'order'=>$this->order,
        // 'sectionIdea'=>$this->sectionIdea,
        // 'questions'=>$this->questions,
        // 'questions'=>$this->is_completed,
        // 'created_at'=>$this->created_at->toDateTimeString()
      ];
    }
}
