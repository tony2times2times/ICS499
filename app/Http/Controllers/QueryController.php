<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodEaten;
use Illuminate\Http\Request;

class QueryController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return String Template
     */
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request['search'];
        $food = new Food();

        $resultsPerPage = $request->get('showAll') ?? 25;

        $results = $food->where('name', 'like', '%' . $query . '%')
            ->where('id', '>', 50)
            ->simplePaginate($resultsPerPage);

        // get previous user id
        $previous = $food->where('id', '<', $food)->max('id');

        // get next user id
        $next = $food->where('id', '>', $food)->min('id');

        $previous = 0;
        $next = 0;
        return view('foodSearchResults')->with('foods', $results, 'previous', $previous, 'next', $next);
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
