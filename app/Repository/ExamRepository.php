<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Theme;
use App\Models\Domaine;
use App\Models\Library;
use App\Models\Question;
use App\Repository\ExamRepositoryInterface;


class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exams = Exam::all();
        return view('pages.Exams.index',compact('exams'));
    }

    public function create()
    {
        $data['Domaines'] = Domaine::all();
        $data['themes'] = Theme::all();

        return view('pages.Exams.create',$data);
    }

    public function store($request)
    {
        try {

            $exams = new Exam();
            $exams->name = $request->Name;
            $exams->Domaine_id = $request->Domaine_id;
            $exams->Theme_id = $request->Theme_id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $questions = Question::where('exam_id',$id)->get();
        $exams = Exam::findOrFail($id);
        return view('pages.Questions.index_formateur',compact('questions','exams'));
    }

    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        $data['Domaines'] = Domaine::all();
        $data['themes'] = Theme::all();
        return view('pages.Exams.edit', $data, compact('exam'));
    }

    public function update($request)
    {
        try {
            $exam = Exam::findorFail($request->id);
            $exam->Name = $request->Name;
            $exam->Domaine_id = $request->Domaine_id;
            $exam->Theme_id = $request->Theme_id;
            $exam->save();
            toastr()->success('Les données ont été modifiées');
            return redirect()->route('Exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        
        Exam::destroy($request);
        toastr()->error("Les données ont été supprimées");
        return redirect()->back();
    }
}
