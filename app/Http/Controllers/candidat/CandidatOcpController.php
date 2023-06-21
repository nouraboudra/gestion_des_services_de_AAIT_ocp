<?php

namespace App\Http\Controllers\candidat;

use App\Http\Controllers\Controller;
use App\Models\CandidatOcp;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CandidatOcpController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        $users = User::with('roles')->get();
        $candidats = CandidatOcp::all(); // Retrieve all candidats from the database

        return view("content.management.candidat-ocp-index", compact('candidats'));
        
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
