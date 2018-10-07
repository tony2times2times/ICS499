<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodEaten extends Model
{
    protected $table = "food_eaten";

    public function foods()
    {
        return $this->belongsTo('App\Food');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param \App\string $date
     * @param \App\int $userId
     * @return array
     */
    public static function getFoodsEatenPerDay(string $date, int $userId)
    {
        $foodsEaten = FoodEaten::all()
            ->whereDate('created_at', $date)
            ->where('user_id', $userId);

        return $foodsEaten ?? [];
    }
}
