<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
  protected $table = 'AS_section';
  protected $primaryKey = 'sectionid';
  protected $imageFolder = 'topic_images';

  public function mainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_main_subtopics', 'subtopic_id','mainTopic_id')->withTimestamps();
  }

  public function customMainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_custom_maintopics_package_subtopics','subTopic_id','mainTopic_id')->withPivot('package_id')->withTimestamps();
  }

  public function customPackages()
  {
    return $this->belongsToMany('App\SubTopic', 'AS_custom_maintopics_package_subtopics','subTopic_id','package_id')->withPivot('mainTopic_id')->withTimestamps();
  }


  public function getFirstQuestion()
  {
    if($this->firstquestionid==''){
      // $id=preg_match('%<div[^>]+id="something"[^>]*>(.*?)</div>%si', $string)
      //need to work on this
      $firstQuestion=$this->url;

    }else {
      $firstQuestion=$this->questions->find($this->firstquestionid);

    }

    return  $firstQuestion;
  }


  public function getImageLink()
  {
    return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
  }


  public function questions()
  {
    return $this->hasMany('App\Question', 'sectionid');
  }

}
