<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Submission;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $submissions = Submission::where('user_id', $user->id)->get();
        $questions = Question::get();
        return view('home', [
            'user' => $user,
            'submissions' => $submissions,
            'questions' => $questions
        ]);
    }
}
