<?php

namespace App\Http\Controllers;

use App\DashboardChart;
use App\DietPlan;
use Illuminate\Http\Request;
use App\User;
use App\Food;
use App\FoodEaten;
use Khill\Lavacharts\Charts\Chart;

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

        $foodsEaten = Food::getFoodsEatenByUser($user_id);
        // Get all foods created by this user
        $user->foods = Food::all()->where('user_id', $user_id);

        // Get the diet plan for this user
        $user->dietPlan = DietPlan::all()->where('user_id', $user_id);

        // Create Chart
        $lava = new DashboardChart();
        $lava = $lava->getChart();

        $viewData = [
            'foods' => $user->foods,
            'dietPlan' => $user->dietPlan,
            'mealOptions' => Food::MealOptions,
        ];

        $viewData = array_merge($viewData, $lava);

        return view('dashboard')->with($viewData);
    }
}
