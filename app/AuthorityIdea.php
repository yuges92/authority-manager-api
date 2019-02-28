<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityIdea extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_idea_authority';
  // protected $primaryKey = 'pkey';

  public function idea()
  {
    return $this->belongsTo('App\Idea', 'ideaid');
  }
}
