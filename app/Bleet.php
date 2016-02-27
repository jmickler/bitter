<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bleet extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\bleet_user');
    }
}
