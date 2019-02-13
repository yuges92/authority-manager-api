<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//this model is for pivot table for the custom chosen subtopics for the packages
class CustomMainTopicPackageSubTopic extends Model
{
  protected $table = 'AS_custom_maintopics_package_subtopics';
  protected $primaryKey = 'id';


  public function Package()
  {
    return $this->hasOne('App\Package');
  }

  // public function MainTopic()
  // {
  //   return $this->belongsTo('App\MainTopic');
  // }
  //
  // public function SubTopic()
  // {
  //   return $this->belongsTo('App\SubTopic');
  // }


}
