<?php

namespace App\Http\Controllers;

use App\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFeedbackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feedback = DB::table('user_feedback')
            ->join('users', 'users.id', '=', 'user_feedback.user_id')
            ->simplePaginate(25);

        //dd($feedback);
        return view('adminFeedback')->with('feedback', $feedback);
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

    /**
     * @param \App\Http\Controllers\int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $feedback = UserFeedback::find($id);
        $feedback->delete();

        return redirect('/feedback')->with('success', 'Feedback Removed');
    }
}
