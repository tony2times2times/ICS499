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

class DashboardController extends Controller
{

    const ImportCSV = FALSE;

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

        // Importer
        if (self::ImportCSV == TRUE) {
            $this->doImport();
        }

        //$foodsEaten = Food::getFoodsEatenByUser($user_id);

        $foodsEaten = Food::getFoodsEatenByUserPerDay(auth()->user()->id, date('Y-m-d', time()));
        // Get all foods created by this user
        $user->foods = Food::all()->where('user_id', $user_id);

        // Create Chart
        $lava = new DashboardChart();
        $lava = $lava->getChart($users);

        $viewData = [
            'foods' => $user->foods,
            'dietPlan' => $users,
            'mealOptions' => Food::MealOptions,
            'breakfastFoodsEaten' => $foodsEaten['Breakfast'] ?? [],
            'lunchFoodsEaten' => $foodsEaten['Lunch'] ?? [],
            'dinnerFoodsEaten' => $foodsEaten['Dinner'] ?? [],
            'caloriesEatenToday' => $foodsEaten['calories_eaten_per_day'],
        ];

        $viewData = array_merge($viewData, $lava);

        return view('dashboard')->with($viewData);
    }

    protected function doImport()
    {
        $row = 0;
        if (($handle = fopen(public_path() . '/import_file_final.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {

                $row++;
                if ($row > 3) {
                    $food = new Food();
                    $food->name = $data[2];
                    $food->calorie_count = $data[7];
                    $food->user_id = 4;
                    //$food->category = $data[1];
                    $food->save();
                }
            }
            fclose($handle);
        }
    }
}
