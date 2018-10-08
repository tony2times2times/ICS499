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

        $id = auth()->user()->id;
        DietPlan::calculatePlan($request, $id);

        return redirect('/dashboard')->with('success', 'Diet Plan Created');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'weight' => 'required',
            'date' => 'required',
        ]);

        $id = auth()->user()->id;
        DietPlan::calculatePlan($request, $id);

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
            $error = "Unable to Remove Diet Plan";
        }
        return redirect('/dashboard')->with('success', isset($error) ? $error : 'Diet Plan Removed');
    }
}