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
}
