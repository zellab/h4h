<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    //
    public function all() {
        
        $questions = Question::get();

        return view('welcome', [
            'questions' => $questions
        ]);

    }

    public function single($id) {
        
        $question = Question::find($id);
        $user = Auth::user();

        $questions = Question::get();

        return view('question', [
            'question' => $question,
            'questions' => $questions,
            'user' => $user,
        ]);

    }

    public function add() {
        return view('create');
    }

    public function create(Request $request) {
        $this->validate($request, array(
            'question_title' => 'required|max:1000',
            'question_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'question_guidelines'  => 'required|max:1000',
            'question_deadline' => 'required|date',
            'question_category' => 'required',
        ));

        $question = new Question;
        $question->question_title = request('question_title');
        $question->question_image = request('question_image')->store('images', 'public');
        $question->question_guidelines = request('question_guidelines');
        $question->question_deadline = request('question_deadline');
        $question->question_category = request('question_category');
        $question->save();
        
        return redirect()->back()->with('message', 'Successfully created question');

    }

    public function delete($id) {
        $question = Question::find($id);

        $questionimage = base_path().'/public/uploads/'.$question->question_image;
        File::delete($questionimage);
        
        $question->delete();
    }
}
