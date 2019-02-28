<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_idea';
  protected $primaryKey = 'ideaid';
  protected $imageFolder = 'ideas/full/sara5';


  public function getImageLink()
  {
    if(!$this->filename){
      return null;
    }
    return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
  }
}
