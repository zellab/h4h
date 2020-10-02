<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Auth;

class SubmissionController extends Controller
{
    //
    public function submit(Request $request, $id) {
        $user = Auth::user();
        $submission = Submission::where([['user_id', '=', $user->id], ['question_id', '=', $id]])->first();

        if (isset($submission)) {
            return redirect()->back()->with('message', 'You have already submitted a solution. You cannot re-submit');
        } else {
            $this->validate($request, array(
                'submission' => 'required|max:1000',
                'file' => 'file|mimes:pdf|max:20000',
            ));
    
            $submission = new Submission;
            $submission->user_id = $user->id;
            $submission->question_id = $id;
            $submission->submission = request('submission');
            if ($request->has('file')) {
                $submission->file = request('file')->store('pdfs', 'public');
            }
            $submission->save();
    
            return redirect()->back()->with('message', 'Successfully submitted your solution');
        }
        
                
    }
}
