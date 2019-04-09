<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_authority';
  protected $primaryKey = 'authority_id';

  /**
 * return the api account for the authority
 *
 * @return void
 */
  public function authorityApi(){
    return $this->hasOne('App\AuthorityApi', 'authority_id');
  }


  /**
 * return the packages for the authority
 *
 * @return void
 */
  public function packages(){
    return $this->belongsToMany('App\Package', 'AS_authority_packages', 'authority_id', 'package_id')->withTimestamps();
  }

  /**
   * returns list users for the authority
   *
   * @return void
   */
  public function users(){
    return $this->hasMany('App\AuthorityUser', 'authority_id');
  }



  /**
   * return all the subtopics for the authority
   * merges all the topics from custom and standard packges and return a collection subtopics. 
   *
   * @return void
   */
  public function getAllSubTopics(){
    // $authorityApi=auth()->guard('api')->user();
    // $mainTopics=  ($authorityApi->authority->packages()->where('type','standard')->with('mainTopics.subTopics')->get());
    $subTopics =  $this->packages()->with('mainTopics')->get()->pluck('mainTopics')->flatten()->pluck('subTopics')->flatten()->unique('sectionid'); //gets the subtopics from the standard package
    $customSubTopics = $this->packages()->where('type', 'custom')->with('customSubTopics')->get()->pluck('customSubTopics')->flatten()->unique('sectionid'); //gets subtopics from custom package
    $mergedSubTopics = $subTopics->merge($customSubTopics)->unique('sectionid'); //merge all the subtopics together and remove any duplicates

    return $mergedSubTopics;
  }

/**
 * return all the section disclaimers for the authority 
 *
 * @return void
 */
  public function sectionDisclaimers(){
    return $this->belongsToMany('App\SectionDisclaimer', 'AS_disclaimer_authority', 'authority_id', 'disclaimerid');
  }

/**
 * return all the section ideas for the authority
 *
 * @return void
 */
  public function sectionIdeas(){
    return $this->belongsToMany('App\SectionIdea', 'AS_idea_authority', 'authority_id', 'ideaid');
  }


}
