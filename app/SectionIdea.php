<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionIdea extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_section_idea';
  protected $primaryKey = 'ideaid';


  public function idea(){
    return $this->belongsTo('App\Idea', 'ideaid');
  }

  public function subTopics(){
    return $this->belongsTo('App\Subtopic', 'sectionid');
  }

  public function authority(){
    // return $this->hasMany('App\Authority', 'ideaid');

  }
}
