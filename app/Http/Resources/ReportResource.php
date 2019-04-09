<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'title' => $this->subTopic->name,
            'headerDisclaimers' => SectionDisclaimerResource::collection($this->getSectionDisclaimers()->where('displaytype', 'HEADER')),
            'footerDisclaimers' => SectionDisclaimerResource::collection($this->getSectionDisclaimers()->where('displaytype', 'FOOTER')),
            'headerSectionIdeas' => SectionIdeaResource::collection($this->getSectionIdeas()->where('displaytype', 'HEADER')),
            'footerSectionIdeas' => SectionIdeaResource::collection($this->getSectionIdeas()->where('displaytype', 'FOOTER')),
            // 'headerDisclaimers' => SectionDisclaimerResource::collection($this->sectionDisclaimers->where('displaytype', 'HEADER')),
            // 'footerDisclaimers' => SectionDisclaimerResource::collection($this->sectionDisclaimers->where('displaytype', 'FOOTER')),
            // 'headerSectionIdeas' => SectionIdeaResource::collection($this->sectionIdeas->where('displaytype', 'HEADER')),
            // 'footerSectionIdeas' => SectionIdeaResource::collection($this->sectionIdeas->where('displaytype', 'FOOTER')),
            // 'sectionDisclaimersss'=>($this->sectionIdeas->pluck('idea')),
            // 'sectionIdeas'=>$this->sectionIdeas,
            // 'questions' => UserQuestionAnswerResource::collection($this->userAnswers)->sortBy('order'),
            'questions' => UserQuestionAnswerResource::collection($this->getQuestions())->sortBy('order'),
            // 'questions3' => ($this->getQuestions()),
            // 'questionsTEst'=>$this->questions,
            // 'created_at'=>$this->created_at->toDateTimeString()
        ];
    }
}
