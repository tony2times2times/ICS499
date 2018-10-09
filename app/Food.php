<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    const MealOptions = ['Breakfast', 'Lunch', 'Dinner', 'Snacks'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param int $user_id
     * @return array $foodsEatenSorted
     */
    public static function getFoodsEatenByUser(int $user_id)
    {
        $foodsEatenSorted = [];
        $foodsEaten = FoodEaten::all()->where('user_id', $user_id);

        if (!empty($foodsEaten)) {
            foreach (self::MealOptions as $option) {
                foreach ($foodsEaten as $item) {
                    if ($item->meal == $option) {
                        $foodsEatenSorted[$option] = $item;
                    }
                }
            }
        }

        return $foodsEatenSorted;
    }
}
