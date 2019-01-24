<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
  protected $table = 'AS_section';
  protected $primaryKey = 'sectionid';

  public function mainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_main_subtopics', 'subtopic_id','mainTopic_id');
  }
}
