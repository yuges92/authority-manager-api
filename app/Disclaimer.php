<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disclaimer extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_disclaimer';
  protected $primaryKey = 'disclaimerid';
  protected $imageFolder = 'disclaimers/full/sara5';

  public function getImageLink()
  {
    if(!$this->filename){
      return null;
    }
    return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
  }
}
