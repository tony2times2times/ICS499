<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DietPlan;

class DietPlanController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDietPlan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'calories_day' => 'required',
        ]);

        // Create DietPlan
        $dietPlan = new DietPlan();
        $dietPlan->calories_day = $request->input('calories_day');
        $dietPlan->user_id = auth()->user()->id;

        $dietPlan->save();

        return redirect('/dashboard')->with('success', 'Diet Plan Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dietPlan = DietPlan::find($id);
        return view('editDietPlan')->with('dietPlan', $dietPlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'calories_day' => 'required',
        ]);

        // Create DietPlan
        $dietPlan = new DietPlan();
        $dietPlan->calories_day = $request->input('calories_day');
        $dietPlan->user_id = auth()->user()->id;

        $dietPlan->save();

        return redirect('/dashboard')->with('success', 'Diet Plan Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dietPlan = DietPlan::find($id);
        $dietPlan->delete();

        return redirect('/dashboard')->with('success', 'Diet Plan Removed');
    }
}