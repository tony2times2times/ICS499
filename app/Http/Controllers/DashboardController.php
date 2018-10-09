<?php

namespace App\Http\Controllers;

use App\DashboardChart;
use App\DietPlan;
use Illuminate\Http\Request;
use App\User;
use App\Food;
use App\FoodEaten;
use Khill\Lavacharts\Charts\Chart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $users = DB::table('users')
            ->leftJoin('diet_plan', 'users.id', '=', 'diet_plan.user_id')
            ->where('users.id', $user_id)
            ->get();

        $foodsEaten = Food::getFoodsEatenByUser($user_id);

        // Get all foods created by this user
        $user->foods = Food::all()->where('user_id', $user_id);

        $caloriesEatenToday = FoodEaten::getFoodsEatenPerDay(Carbon::now(), $user_id);

        // Create Chart
        $lava = new DashboardChart();
        $lava = $lava->getChart();

        $viewData = [
            'foods' => $user->foods,
            'dietPlan' => $users,
            'mealOptions' => Food::MealOptions,
            'breakfastFoodsEaten' => $foodsEaten['Breakfast'] ?? [],
            'lunchFoodsEaten' => $foodsEaten['Lunch'] ?? [],
            'dinnerFoodsEaten' => $foodsEaten['Dinner'] ?? [],
            'caloriesEatenToday' => $caloriesEatenToday,
        ];

        $viewData = array_merge($viewData, $lava);

        return view('dashboard')->with($viewData);
    }
}
