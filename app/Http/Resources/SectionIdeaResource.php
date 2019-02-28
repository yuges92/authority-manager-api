<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionIdeaResource extends JsonResource
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
        'displaytype'=>($this->displaytype),
        'title'=>($this->idea->title),
        'description'=>($this->idea->sadescription),
        'reference'=>($this->idea->references),
        'image'=>($this->idea->getImageLink()),
        // 'sectionIdea'=>$this->sectionIdea,
        // 'questions'=>$this->questions,
        // 'questions'=>$this->is_completed,
        // 'created_at'=>$this->created_at->toDateTimeString()
      ];
    }
}
