<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
  protected $table = 'AS_authority';
  protected $primaryKey = 'authority_id';


  public function authorityApi()
  {
      return $this->hasOne('App\AuthorityApi', 'authority_id');
  }

  public function packages()
  {
    return $this->belongsToMany('App\Package', 'AS_authority_packages', 'authority_id','package_id')->withTimestamps();

  }

  public function users()
  {
    return $this->hasMany('App\AuthorityUser', 'authority_id');

  }


  public function getAllSubTopics()
  {
    // $authorityApi=auth()->guard('api')->user();
    // $mainTopics=  ($authorityApi->authority->packages()->where('type','standard')->with('mainTopics.subTopics')->get());
    $subTopics=  $this->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->pluck('subTopics')->flatten()->unique('sectionid');
    $customSubTopics=$this->packages()->where('type','custom')->with('customSubTopics')->get()->pluck('customSubTopics')->flatten()->unique('sectionid');
    $mergedSubTopics=$subTopics->merge($customSubTopics)->unique('sectionid');

    return $mergedSubTopics;
  }


  public function sectionDisclaimers()
  {
    return $this->belongsToMany('App\SectionDisclaimer','AS_disclaimer_authority', 'authority_id', 'disclaimerid');

  }

  public function sectionIdeas()
  {
    return $this->belongsToMany('App\SectionIdea','AS_idea_authority', 'authority_id', 'ideaid');

  }
}
