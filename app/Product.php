<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $autoincrement=false;
    protected $keyType='string';
    protected $imageFolder = 'disclaimers/full/sara5';


    public function questionAnswers()
    {
        return $this->hasMany('App\QuestionAnswerProduct', 'product_id');
    }

    // public function getImageLink(){
    //   if(!$this->filename){
    //     return null;
    //   }
    //   return (config('sara.saraImagesURL')."/{$this->imageFolder}/{$this->filename}");
    // }
    public function image()
    {
      return $this->hasOne('App\Image', 'product_id');
    }

    public function getLink($authority=null)
    {
      return (config('sara.livingMadeEasyBaseUrl') . "/product.php?product_id=".str_slug ($this->product_id, '-')."&referer=asksara&auth=sara5");
    }
}
