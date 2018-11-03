<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{

    const MAXCALORIESPERDAY = 500;

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

        $dateDiff = time() - $request->get('date');
        $dateDiff = round($dateDiff / (60 * 60 * 24));

        if ($request->get('goal') === 'lose') {
            $weightLossPerDay = $dateDiff / $request->get('weight') * 3500;
            $dailyCalories = $calories - $weightLossPerDay / 7;
        }
        elseif ($request->get('goal') === 'lose') {
            $weightLossPerDay = $dateDiff / $request->get('target') * 3500;
            $dailyCalories = $calories + $weightLossPerDay / 7;
        }
        else {
            $dailyCalories = $calories;
        }

        //TODO FIX ME
        $dietPlan = DietPlan::all()->where('user_id', $id);
        if (empty($dietPlan)) {
            $dietPlan = new DietPlan();
        }

        if ((int) $dailyCalories >= self::MAXCALORIESPERDAY) {
            throw new \Exception('This is an unhealthy wieght plan');
        }

        $dietPlan = new DietPlan();
        $dietPlan->user_id = $id;
        $dietPlan->weight = (int) $request->get('weight');
        $dietPlan->target_date = $request->get('date');
        $dietPlan->calories_day = (int) $dailyCalories;
        $dietPlan->save();
    }
}
