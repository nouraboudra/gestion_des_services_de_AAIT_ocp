<?php

namespace App\Http\Controllers\candidat;

use App\Http\Controllers\Controller;
use App\Models\CandidatOcp;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CandidatOcpController extends Controller
{


    public function index(Request $request)
    {
        $page_size = $request->input('page_size', 10); // Default page size is 10

        $roles = Role::all();
        $users = User::with('roles')->get();
        $candidats = CandidatOcp::paginate($page_size); // Retrieve all candidats from the database
        return view("content.management.candidat-ocp-index", compact('candidats', 'page_size'));
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