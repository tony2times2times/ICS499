<?php

namespace App;

use Carbon\Carbon;
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
     * @param Carbon $date
     * @param int $userId
     * @return FoodEaten[]|array|\Illuminate\Database\Eloquent\Collection
     */
    public static function getFoodsEatenPerDay(Carbon $date, int $userId)
    {

        $foodsEaten = FoodEaten::all()
            ->where('created_at', '=', $date->toDateString())
            ->where('user_id', $userId);

        return $foodsEaten ?? [];
    }
}
