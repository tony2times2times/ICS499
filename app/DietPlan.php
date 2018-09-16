<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    protected $table = "diet_plan";

    public function users(){
        return $this->belongsTo('App\User');
    }
}
