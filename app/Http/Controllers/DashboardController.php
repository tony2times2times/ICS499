<?php

namespace App\Http\Controllers;

use App\DietPlan;
use Illuminate\Http\Request;
use App\User;
use App\Food;
use App\FoodEaten;

class DashboardController extends Controller
{

    const MealOptions = ['Breakfast', 'Lunch', 'Dinner', 'Snacks'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $foodsEaten = $this->getFoodsEatenByUser($user_id);
        // Get all foods created by this user
        $user->foods = Food::all()->where('user_id', $user_id);

        // Get the diet plan for this user
        $user->dietPlan = DietPlan::all()->where('user_id', $user_id);

        $viewData = [
            'foods' => $user->foods,
            'dietPlan' => $user->dietPlan,
            'mealOptions' => self::MealOptions,
        ];

        return view('dashboard')->with($viewData);
    }

    /**
     * @param int $user_id
     * @return array $foodsEatenSorted
     */
    protected function getFoodsEatenByUser(int $user_id)
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
                // Create and array of foods eaten by time e.g foodsEaten['breakfast'] = ['apple','bananna']
            }
        }

        return $foodsEatenSorted;
    }
}
