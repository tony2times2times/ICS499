<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodEaten extends Model
{
    protected $table = "food_eaten";

    public function foods(){
        return $this->belongsTo('App\Food');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

}
