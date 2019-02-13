<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
  protected $table = 'AS_section';
  protected $primaryKey = 'sectionid';

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


public function getFirstQuestionID()
{
  if($this->firstquestionid==''){
// $id=preg_match('%<div[^>]+id="something"[^>]*>(.*?)</div>%si', $string)

    $this->firstquestionid=$this->url;

  }

return  $this->firstquestionid;
}

}
