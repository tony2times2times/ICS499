<?php

namespace App\Http\Controllers;

use App\DietPlan;
use Illuminate\Http\Request;
use App\User;
use App\Food;

class DashboardController extends Controller {
    const MealOptions = ['Breakfast', 'Lunch', 'Dinner', 'Snacks'];


    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        // Get all foods created by this user
        $user->foods = Food::all()->where('user_id', $user_id);

        // Get the diet plan for this user
        $user->dietPlan = DietPlan::all()->where('user_id', $user_id);

        $mealOptions = self::MealOptions;

        $viewData = ['foods' => $user->foods, 'dietPlan' => $user->dietPlan, 'mealOptions' => $mealOptions];

        return view('dashboard')->with($viewData);
    }
}
