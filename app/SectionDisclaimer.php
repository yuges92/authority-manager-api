<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionDisclaimer extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_section_disclaimer';
  protected $primaryKey = 'pkey';
  public $incrementing=false;

  public function disclaimer()
  {
    return $this->belongsTo('App\Disclaimer', 'disclaimerid');
  }

  public function subTopic()
  {
    return $this->belongsTo('App\SubTopic', 'sectionid');
  }

  
}
