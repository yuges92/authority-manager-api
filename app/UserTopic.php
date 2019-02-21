<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTopic extends Model
{
  protected $connection = 'sqlsrv_DLF_livedata';
  protected $table = 'As_user_topics';
  protected $fillable = ['authority_user_id', 'subTopic_id', 'is_completed'];

  public function authorityUser()
  {
    $this->belongsTo('App\AuthorityUser', 'authority_user_id');
  }
}
