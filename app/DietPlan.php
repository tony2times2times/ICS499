<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{

    protected $table = "diet_plan";

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 1lb weight loss == 3500 calories in a week / 7 day
     * @param \Illuminate\Http\Request $request
     */
    public static function calculatePlan(Request $request)
    {
        // TODO handle diet plan calculation


    }
}
