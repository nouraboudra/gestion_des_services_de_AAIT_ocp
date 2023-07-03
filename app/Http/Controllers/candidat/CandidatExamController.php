<?php

namespace App\Http\Controllers\Candidat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CandidatExamRepositoryInterface;

class CandidatExamController extends Controller
{
    
    protected $candidatExam;

    public function __construct(CandidatExamRepositoryInterface $candidatExam)
    {
        $this->candidatExam = $candidatExam;
    }

    public function index()
    {
        return $this->candidatExam->index();
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        return $this->candidatExam->show($id);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
