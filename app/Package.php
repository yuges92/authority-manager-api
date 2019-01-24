<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $table = 'AS_packages';


  public function mainTopics()
  {
    return $this->belongsToMany('App\MainTopic', 'AS_package_maintopics', 'package_id','mainTopic_id');
  }

}
