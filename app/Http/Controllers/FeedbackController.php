<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\UserFeedback;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feedback = DB::table('user_feedback')->simplePaginate(25);

        return view('createFeedback')->with('feedback', $feedback);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);

        try {
            $feedback = new UserFeedback();
            $feedback->user_id = auth()->user()->id;
            $feedback->message = $request->get('message');
            $feedback->save();
        } catch (\Exception $exception) {
            return redirect('/feedback')->with('error', 'Unable to send feedback');
        }

        return redirect('/feedback')->with('success', 'Feedback Submitted');
    }

}
