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


    public function questionAnswers()
    {
        return $this->hasMany('App\QuestionAnswerProduct', 'product_id');
    }
}
