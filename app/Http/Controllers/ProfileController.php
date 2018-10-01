<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile');
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->gender = $request->get('gender');
            $user->height = $request->get('height');
            $user->weight = $request->get('weight');
            $user->calories = $request->get('calories');
            $user->save();
        } catch (\Exception $exception) {
            // todo Handle
        }

        return redirect('/dashboard')->with('success', 'User Updated');
    }
}
