<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainTopic extends Model
{

    protected $table = 'AS_MainTopics';

    // protected $primaryKey = 'topic_id';
    protected $fillable = ['name','description','filename','order','is_used', 'slug'];

    public function subTopics()
    {
      return $this->belongsToMany('App\SubTopic', 'AS_main_subtopics', 'mainTopic_id','subtopic_id');
    }

    public function packages()
    {
      return $this->belongsToMany('App\Package', 'AS_package_maintopics', 'mainTopic_id','package_id');
    }

}
