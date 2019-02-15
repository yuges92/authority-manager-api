<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $table = 'AS_packages';


  public function mainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_package_maintopics', 'package_id','mainTopic_id')->withTimestamps();
  }


  public function customMainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_custom_maintopics_package_subtopics','package_id','mainTopic_id')->withPivot('subTopic_id')->withTimestamps();
  }

  public function customSubTopics()
  {
    return $this->belongsToMany('App\SubTopic', 'AS_custom_maintopics_package_subtopics','package_id','subTopic_id')->withPivot('mainTopic_id')->withTimestamps();
  }


  public function authorities()
  {
    return $this->belongsToMany('App\Authority', 'AS_authority_packages', 'package_id','authority_id')->withTimestamps();

  }


public function subTopics()
{
return $this->hasManyThrough('App\MainTopic', 'App\SubTopic');
}

}
