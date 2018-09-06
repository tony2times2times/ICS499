<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function foods(){
        return $this->belongsTo('App\Food');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

}
