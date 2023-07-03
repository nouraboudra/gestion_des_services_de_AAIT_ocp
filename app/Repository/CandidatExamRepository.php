<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Theme;
use App\Models\Domaine;
use App\Models\Library;
use App\Models\Question;
use App\Repository\CandidatExamRepositoryInterface;

class CandidatExamRepository implements CandidatExamRepositoryInterface
{

    public function index()
    {
        $exams = Exam::all();
        return view('pages.Candidat.index',compact('exams'));
    }

    public function create()
    {
        
    }

    public function store($request)
    {
        
    }

    public function show($exam_id)
    {
        return view('pages.Candidat.show',compact('exam_id'));
    }

    public function edit($id)
    {
        
    }

    public function update($request)
    {
        
    }

    public function destroy($request)
    {
        
        
    }
}
