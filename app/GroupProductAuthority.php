<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProductAuthority extends Model
{
  use \Awobaz\Compoships\Compoships;
  protected $connection = 'sqlsrv';
    protected $table = 'AS_question_answer_group_authority';
    // protected $primaryKey = 'pkey';
  
    public function groupProduct()
    {
      return $this->belongsTo('App\GroupProduct', 'groupid','groupid');
    }
}
