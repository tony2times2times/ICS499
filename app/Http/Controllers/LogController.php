<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\User;
use App\FoodEaten;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
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

        $users = DB::table('users')
            ->leftJoin('diet_plan', 'users.id', '=', 'diet_plan.user_id')
            ->where('users.id', $user_id)
            ->get();

        $foodsEaten = Food::getFoodsEatenByUserPerDay(auth()->user()->id, Carbon::now());

        $viewData = [
            'dietPlan' => $users,
            'breakfastFoodsEaten' => $foodsEaten['Breakfast'] ?? [],
            'lunchFoodsEaten' => $foodsEaten['Lunch'] ?? [],
            'dinnerFoodsEaten' => $foodsEaten['Dinner'] ?? [],
            'caloriesEatenToday' => $foodsEaten['calories_eaten_per_day'] ?? 0,
            'date' => Carbon::now(),
        ];

        return view('log')->with($viewData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        $date = Carbon::parse($request->get('search'));
        $foodsEaten = Food::getFoodsEatenByUserPerDay(auth()->user()->id, $date);
        $viewData = [

            'breakfastFoodsEaten' => $foodsEaten['Breakfast'] ?? [],
            'lunchFoodsEaten' => $foodsEaten['Lunch'] ?? [],
            'dinnerFoodsEaten' => $foodsEaten['Dinner'] ?? [],
            'caloriesEatenToday' => $foodsEaten['calories_eaten_per_day'] ?? 0,
            'date' => $date,
        ];

        return view('log')->with($viewData);
    }
}
