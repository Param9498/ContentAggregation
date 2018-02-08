<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function subtopics()
    {
        return $this->hasMany('App\SubTopic');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
