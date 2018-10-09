<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FoodEaten extends Model
{

    /**
     * Table Name
     * @var string $table
     */
    protected $table = "food_eaten";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function foods()
    {
        return $this->belongsTo('App\Food');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param \App\int $date
     * @param \App\int $userId
     * @return $foodsEaten
     */
    public static function getFoodsEatenPerDay( $date, int $userId)
    {

        $foodsEaten = FoodEaten::all()
            ->where('created_at', '=', $date->toDateTimeString())
            ->where('user_id', $userId);

        return $foodsEaten ?? [];
    }
}
