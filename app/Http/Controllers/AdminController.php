<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use App\Question;
Use App\User;

class AdminController extends Controller
{
    //
    public function index() {
        $userCount = User::count();
        $submissionCount = Submission::count();
        $questionCount = Question::count();
        
        $questions = Question::get();
        $submissions = Submission::orderBy('id', 'DESC')->paginate(10);
        $users = User::get();

        return view('admin', [
            'userCount' => $userCount,
            'submissionCount' => $submissionCount,
            'questionCount' => $questionCount,
            'questions' => $questions,
            'submissions' => $submissions,
            'users' => $users,
        ]);
    }

    public function detail($id) {
        
        $submission = Submission::find($id);
        $user = User::where('id', $submission->user_id)->first();
        $question = Question::where('id', $submission->question_id)->first();

        return view('submission', [
            'question' => $question,
            'submission' => $submission,
            'user' => $user,
        ]);
    }
}
