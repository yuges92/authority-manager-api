<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class UserTopic extends Model
{
  protected $connection = 'sqlsrv_DLF_livedata';
  protected $table = 'As_user_topics';
  protected $fillable = ['authority_user_id', 'subTopic_id', 'is_completed'];

  // /**
  //  * The "booting" method of the model.
  //  *
  //  * @return void
  //  */
  // protected static function boot()
  // {
  //     parent::boot();
  //
  //     static::addGlobalScope('is_completed', function (Builder $builder) {
  //         $builder->where('is_completed', 1);
  //     });
  // }



  public function authorityUser()
  {
    return   $this->belongsTo('App\AuthorityUser', 'authority_user_id');
  }

  public function subTopic()
  {
    return $this->belongsTo('App\SubTopic', 'subTopic_id');
  }

  public function questionAnswers()
  {
    return $this->hasMany('App\UserQuestionAnswer', 'user_topic_id');

  }

  /**
  *  include completed topic for user.
  *
  * @param \Illuminate\Database\Eloquent\Builder $query
  * @return \Illuminate\Database\Eloquent\Builder
  */
  public function scopeCompleted($query)
  {
    return $query->where('is_completed', 1);
  }
}
