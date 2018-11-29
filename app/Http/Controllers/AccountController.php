<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
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
        return view('account');
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(auth()->user()->id);
        return view('account')->with('user', $user);
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
            'email' => 'required',
        ]);

        $status = "Account Updated";
        try {
            $user = User::find($id);

            if (!empty($request->get('password'))) {
                $user->password = $request->get('password');
            }
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
        } catch (\Exception $exception) {
            $status = "Unable to account";
        }

        return redirect('/dashboard')->with('success', $status);
    }
}
