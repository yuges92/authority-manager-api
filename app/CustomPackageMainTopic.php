<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomPackageMainTopic extends Model
{

  protected $table = 'AS_custom_package_main_topics';

  public function packages()
  {
    return $this->belongsTo('App\Package', 'AS_package_maintopics', 'mainTopic_id','package_id');

  }

  public function customSubtopics()
  {
    return $this->belongsToMany('App\SubTopic', 'AS_custom_package_subtopics', 'custom_package_main_topic_id','subTopic_id');

  }

}
