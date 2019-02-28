<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorityUserResource extends JsonResource
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
        'user'=>$this->user,
        'completedTopics'=>new UserTopicsCollection($this->topics->where('is_completed','1')),
      ];
    }
}
