<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
