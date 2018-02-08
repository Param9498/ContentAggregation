<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function university()
    {
        return $this->belongsTo('App\University');
    }
    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
