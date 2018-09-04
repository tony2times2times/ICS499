<?php

namespace App\Http\Controllers;
use App\Food;
use Illuminate\Http\Request;

class QueryController extends Controller {

    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request['search'];
        $results = Food::where('name', 'like', '%' . $query . '%')->get();

        return view('foodSearchResults')->with('foods', $results);
    }
}
