<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bleet_user extends Model
{
    public function bleets()
    {
        return $this->belongTo('App\Bleet');
    }

    public function users()
    {
        return $this->belongTo('App\User');
    }
}
