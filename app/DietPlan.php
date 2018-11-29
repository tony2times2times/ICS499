<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{

    const MAXCALORIESPERDAY = 500;

    ///**
    // * Attributes
    // */
    //protected $id;
    //protected $calories_day;
    //protected $weight;
    //protected $target_date;
    //protected $goal;
    //protected $user_id;
    //protected $created_at;
    //protected $updated_at;

    /**
     * Table Name
     * @var string $table
     */
    protected $table = "diet_plan";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $request
     * @param \App\int $id
     */
    public static function calculatePlan($request, int $id)
    {

        $user = User::find($id);
        $kg = $user->weight * (1 / 2.2046226218);
        $cm = $user->height * .3937;

        if ($user->gender === 'Male') {
            $calories = (9.99 * $kg + 6.25 * $cm - 4.92 * $user->age + 5) * 1.2;
        }
        else {
            $calories = (9.99 * $kg + 6.25 * $cm - 4.92 * $user->age - 161) * 1.2;
        }

        $dateDiff = round(abs(strtotime($request->get('date'))-strtotime(  date('Y-m-d')))/86400);
        if ($request->get('goal') === 'Lose') {
            $weightLossPerDay = $dateDiff / $request->get('weight') * 3500;
            $dailyCalories = $calories - $weightLossPerDay / 7;
        }
        elseif ($request->get('goal') === 'Gain') {
            $weightLossPerDay = $dateDiff / $request->get('target') * 3500;
            $dailyCalories = $calories + $weightLossPerDay / 7;
        }
        else {
            $dailyCalories = $calories;
        }

        DietPlan::where('user_id', $id)->delete();
        if ((int) $dailyCalories <= self::MAXCALORIESPERDAY) {
            throw new \Exception('This is an unhealthy wieght plan');
        }

        $dietPlan = new DietPlan();
        $dietPlan->user_id = $id;
        $dietPlan->weight = (int) $request->get('weight');
        $dietPlan->target_date = $request->get('date');
        $dietPlan->calories_day = (int) $dailyCalories;
        $dietPlan->goal = $request->get('goal');
        $dietPlan->save();
    }
}
