<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityUser extends Model
{
  protected $connection = 'sqlsrv_DLF_livedata';
  protected $table = 'AS_authority_users';

  protected $fillable = ['user', 'authority_id'];

  public function authority()
  {
    $this->belongsTo('App\Authority', 'authority_id');
  }


  public function questionAnswers()
  {
    return $this->hasMany('App\UserQuestionAnswer', 'authority_user_id');

  }

  public function topics()
  {
    return $this->hasMany('App\UserTopic', 'authority_user_id');

  }


}
