<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'madeeasy_group';
    protected $primaryKey = 'groupid';
    protected $imageFolder = 'producttypes_images';
    // protected $autoincrement=false;


    public function groupProducts()
    {
       return $this->belongsTo('App\GroupProduct', 'groupid');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'madeeasy_group_product', 'groupid', 'product_id');
    }


    public function getImageLink()
    {
      if(!$this->image){
        return null;
      }
      return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->image}");
    }
}
