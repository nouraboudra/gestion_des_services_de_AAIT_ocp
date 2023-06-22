<?php

namespace App\Http\Controllers\planification;

use App\Http\Controllers\Controller;
use App\Models\SessionFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionFormationController extends Controller
{
    public function store(Request $request)
    {
        $rules = $request->validate([
            'date_debut' => 'required|date',
            'formation_id' => 'required|exists:formations,id',
            'salle_id' => 'required|exists:salles,id',
            'groupe_id' => 'required|exists:groupes,id',
        ]);

        $messages = [
            'required' => 'Le champ :attribute est obligatoire.',
            'date' => 'Le champ :attribute doit être une date valide.',
            'after' => 'Le champ :attribute doit être une date postérieure à la date de début.',
            'exists' => 'Le champ :attribute doit correspondre à un enregistrement existant.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error);
            }
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    
        SessionFormation::create([
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_debut'),
            'formation_id' => $request->input('formation_id'),
            'salle_id' => $request->input('salle_id'),
            'groupe_id' => $request->input('groupe_id'),
            // Add other fields as necessary
        ]);
    
        Toastr::success('Session created successfully.', 'Success');

        return redirect()->route('planing.sessions.index',$request->input('formation_id'));
    }
    
}
