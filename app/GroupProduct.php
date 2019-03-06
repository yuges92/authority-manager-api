<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'madeeasy_group_product';
    protected $primaryKey = 'groupid';
    // protected $autoincrement=false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
