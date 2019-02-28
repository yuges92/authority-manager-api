<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisclaimerAuthority extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'AS_disclaimer_authority';
  protected $primaryKey = 'pkey';
}
