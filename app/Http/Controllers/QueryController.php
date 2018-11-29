<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodEaten;
use Illuminate\Http\Request;

class QueryController extends Controller
{

    static $searchString = '';

    /**
     * @param \Illuminate\Http\Request $request
     * @return String Template
     */
    public function search(Request $request)
    {
        // Gets the query string from our form submission


        if (!empty($request['search']) && empty($_SESSION['search'])) {
            $_SESSION['search'] = $request['search'];
        }

        $query = isset($_SESSION['search']) ? $_SESSION['search'] : '';

        $food = new Food();

        $results = $food->where('name', 'like', '%' . $query  . '%')
            ->paginate(25);

        return view('foodSearchResults')->with('foods', $results);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return $this
     */
    public function showAll(Request $request)
    {
        $food = new Food();
        $results = $food->where('name', 'like', '%' . 'meat' . '%')->get();

        return view('foodSearchResults')->with('foods', $results);
    }
}
