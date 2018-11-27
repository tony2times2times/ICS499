<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = User::where('id', '!=', auth()->user()->id)
            ->paginate(25);

        return view('admin')->with('user', $user);
    }
}
