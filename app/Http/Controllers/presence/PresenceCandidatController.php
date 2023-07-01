<?php

namespace App\Http\Controllers\presence;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Domain;
use App\Models\SessionFormation;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PresenceCandidatController extends Controller
{

    public function index()
    {
        $formateur = Auth::user()->userable;
        $today = Carbon::today();
        // Retrieve the sessions of today for the formateur
        $session = SessionFormation::where('formateur_id', $formateur->id)
            ->whereDate('date_debut', $today)
            ->first();
        $sessionCount = SessionFormation::whereDate('date_debut', '<', $today)->count();
        $session = $session->load('groupe.candidats');
        $candidats = $session->groupe->candidats;
        return view('content.presence.presence-presence-index', compact('session', 'candidats', 'sessionCount'));
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
