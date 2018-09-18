<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DietPlan;

class DietPlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDietPlan');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'weight' => 'required',
            'date' => 'required',
        ]);

        $this->calculatePlan($request);

        // Create DietPlan
        $dietPlan = new DietPlan();
        $dietPlan->calories_day = $request->input('calories_day');
        $dietPlan->user_id = auth()->user()->id;

        $dietPlan->save();

        return redirect('/dashboard')->with('success', 'Diet Plan Created');
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    protected function calculatePlan(Request $request)
    {
        // TODO handle diet plan calculation
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Http\Controllers\int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $dietPlan = DietPlan::find($id);
        return view('editDietPlan')->with('dietPlan', $dietPlan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Controllers\int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'weight' => 'required',
            'date' => 'required',
        ]);

        $this->calculatePlan($request);

        $dietPlan = DietPlan::find($id);
        $dietPlan->calories_day = $request->input('calories_day');
        $dietPlan->save();

        return redirect('/dashboard')->with('success', 'Diet Plan Updated');
    }

    /**
     * @param \App\Http\Controllers\int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $dietPlan = DietPlan::find($id);
        if (!empty($dietPlan)) {
            $dietPlan->delete();
        }
        else {
            // todo throw exception
        }
        return redirect('/dashboard')->with('success', 'Diet Plan Removed');
    }
}