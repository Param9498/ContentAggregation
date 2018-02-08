<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
    public function universities()
    {
        return $this->belongsToMany('App\University', 'degree_university');
    }
}
