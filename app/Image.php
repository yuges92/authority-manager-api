<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'images';
    protected $imageFolder = 'products/thumb';

    // protected $primaryKey = 'col_unique';


    public function product()
    {
        $this->belongsTo('App\Product', 'product_id');
    }

    public function getImageLink()
    {
      if(!$this->filename){
        return null;
      }
      return (config('sara.meeImagesURL')."/{$this->imageFolder}/{$this->filename}");
    }
}
