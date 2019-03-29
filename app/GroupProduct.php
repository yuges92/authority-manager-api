<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    use \Awobaz\Compoships\Compoships;
    protected $connection = 'sqlsrv';
    protected $table = 'madeeasy_group';
    protected $primaryKey = 'groupid';
    // protected $autoincrement=false;
    protected $imageFolder = 'producttypes_images';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function getImageLink()
    {
      // if (!$this->filename) {
      //   return null;
      // }
      return (config('sara.saraImagesURL') . "/{$this->imageFolder}/{$this->sara_image}");
    }

    public function getLink($authority=null)
    {
      return (config('sara.livingMadeEasyBaseUrl') . "/products.php?groupname=".str_slug ($this->title, '-')."&referer=asksara&auth=sara5");
    }
}