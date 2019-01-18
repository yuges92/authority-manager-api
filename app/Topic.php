<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $table = 'AS_topics';

    // protected $primaryKey = 'topic_id';
    protected $fillable = ['name','description','filename','order','is_used', 'slug'];

}
