<?php

namespace App\Http\Controllers;
use App\Food;
use App\FoodEaten;
use Illuminate\Http\Request;

class QueryController extends Controller {

    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request['search'];
        $food = new Food();
        $results = $food->where('name', 'like', '%' . $query . '%')->get();

        return view('foodSearchResults')->with('foods', $results);
    }
}
