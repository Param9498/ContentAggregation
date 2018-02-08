<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
