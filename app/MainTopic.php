<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainTopic extends Model
{

  protected $imageFolder = 'mainTopics_images';
  protected $table = 'AS_MainTopics';

  // protected $primaryKey = 'topic_id';
  protected $fillable = ['name','description','filename','order','is_used', 'slug'];

  public function subTopics()
  {
    return $this->belongsToMany('App\SubTopic', 'AS_main_subtopics', 'mainTopic_id','subtopic_id')->withTimestamps();
  }

  public function packages()
  {
    return $this->belongsToMany('App\Package', 'AS_package_maintopics', 'mainTopic_id','package_id')->withTimestamps();
  }

  public function customPackages()
  {
    return $this->belongsToMany('App\Package', 'AS_custom_maintopics_package_subtopics','mainTopic_id','package_id')->withPivot('subtopic_id')->withTimestamps();
  }

  public function customSubTopics()
  {
    return $this->belongsToMany('App\SubTopic', 'AS_custom_maintopics_package_subtopics','mainTopic_id','subtopic_id')->withPivot('package_id')->withTimestamps();
  }


  public function getFile()
  {
    return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
  }

}
