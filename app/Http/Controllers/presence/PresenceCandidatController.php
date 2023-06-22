<?php

namespace App\Http\Controllers\presence;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;

class PresenceCandidatController extends Controller
{
    
    public function index()
    {
        $absences = Absence::all();
        return view('content.presence.presence-candidat-index');
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
        //
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
