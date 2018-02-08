<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
    public function degrees()
    {
        return $this->belongsToMany('App\Degree');
    }
}
