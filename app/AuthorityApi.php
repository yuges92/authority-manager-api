<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
 use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthorityApi extends Authenticatable
{
  use HasApiTokens, Notifiable;

  // protected $guard= 'authorityApi';
  protected $table = 'AS_api_authorities';
  // protected $dates = [
  //     'start_date',
  //     'expiry_date'
  // ];

  // protected $dateFormat = 'dd/mm/yyyy';

  // protected $fillable = ['authority_id','username','password','start_date','end_date', 'slug'];

  protected $hidden = [
    'password',
  ];

  public function authority()
  {
    return $this->belongsTo('App\Authority', 'authority_id');
  }

  public function formatedDate($date)
  {
    $date= \Carbon\Carbon::parse($date);
    return $date->format('d/m/Y');
  }

  public function startDate()
  {
    return $this->formatedDate($this->start_date);
  }

  public function expiryDate()
  {
    return $this->formatedDate($this->expiry_date);
  }

}
