<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'product_supplier';
    protected $primaryKey = 'product_id';
}
