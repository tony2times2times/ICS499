<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a Food of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('foods')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createFoodItem');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);

        // Create Food
        $food = new Food();
        $food->name = $request->input('name');
        $food->calorie_count = (int)$request->input('calorie_count');
        $food->description = $request->input('description');
        $food->user_id = auth()->user()->id;

        $food->save();

        return redirect('/dashboard')->with('success', 'Food Successfully Added');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $food = Food::find($id);
        return view('dashboard')->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $food = Food::find($id);
        return view('editFood')->with('food', $food);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        // Create Food
        $food = Food::find($id);
        $food->name = $request->input('name');
        $food->calorie_count = (int)$request->input('calorie_count');
        $food->description = $request->input('description');
        $food->user_id = auth()->user()->id;

        $food->save();

        return redirect('/dashboard')->with('success', 'Food Updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect('/dashboard')->with('success', 'Food Removed');
    }
}
