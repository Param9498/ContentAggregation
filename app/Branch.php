<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }
}
