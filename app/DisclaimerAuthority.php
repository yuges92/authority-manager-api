<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DisclaimerAuthority extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_disclaimer_authority';
  // protected $primaryKey = 'pkey';
  

  public function disclaimer()
  {
    return $this->belongsTo('App\Disclaimer', 'disclaimerid', 'disclaimerid');
  }

  
  public function authorities()
  {
      return $this->belongsToMany('App\QuestionAnswerDisclaimer', 'AS_disclaimer_authority','disclaimerid', 'authority_id');
  }


}
