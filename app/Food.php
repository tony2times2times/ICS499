<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function getFoodsEatenByUser(int $user_id): array
    {
        $foodsEatenSorted = [];
        $foodsEaten = DB::table('food_eaten')
            ->leftJoin('foods', 'food_eaten.food_id', '=', 'foods.id')
            ->where('food_eaten.user_id', $user_id)
            ->get();

        if (!empty($foodsEaten)) {
            foreach (self::MealOptions as $option) {
                foreach ($foodsEaten as $item) {
                    if ($item->meal == $option) {
                        $foodsEatenSorted[$option][] = $item;
                    }
                }
            }
        }
        return $foodsEatenSorted;
    }
}
