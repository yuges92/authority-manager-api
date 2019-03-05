<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'images';
    // protected $primaryKey = 'col_unique';
}
