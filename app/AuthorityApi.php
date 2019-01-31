<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityApi extends Model
{
  protected $table = 'AS_api_authorities';
  // protected $dates = [
  //     'start_date',
  //     'expiry_date'
  // ];
  
  // protected $dateFormat = 'U';

  // protected $fillable = ['authority_id','username','password','start_date','end_date', 'slug'];



  public function authority()
  {
    return $this->belongsTo('App\Authority', 'authority_id');
  }


}
