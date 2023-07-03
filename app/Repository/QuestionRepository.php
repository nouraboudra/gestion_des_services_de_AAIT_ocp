<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\Exam;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function index()
    {
        $questions = Question::get();
        return view('pages.Questions.index', compact('questions'));
    }

    public function create()
    {
        $exam = Exam::get();
        return view('pages.Questions.create',compact('exam'));
    }

    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();
            toastr()->success("Question a été créée");
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $exams = Exam::get();
        return view('pages.Questions.edit',compact('question','exams'));
    }

    public function update($request)
    {

        try {
            $question = Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->exam_id = $request->exam_id;
            $question->save();
            toastr()->success("La question a été modifiée");
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        Question::destroy($request);
        toastr()->error("La question a été supprimée");
        return redirect()->back();
        
    }
}
