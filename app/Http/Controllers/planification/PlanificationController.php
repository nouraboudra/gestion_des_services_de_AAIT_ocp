<?php

namespace App\Http\Controllers\planification;
use App\Models\PlanFormation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PlanificationController extends Controller
{
    public function index()
    {
        return view('content.pages.pages-account-settings-connections');
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {

        $rules = [
            'Intitulé' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'theme_id' => 'required|array',

        ];

        $messages = [
            'required' => 'Le champ :attribute est obligatoire.',
            'date' => 'Le champ :attribute doit être une date valide.',
            'integer' => 'Le champ :attribute doit être un entier.',
            'after' => 'Le champ :attribute doit être une date postérieure à la date de début.',
            'array' => 'Le champ :attribute doit être une Liste.',
        ];
// Validate the request data
$validator = Validator::make($request->all(), $rules, $messages);
// Add custom validation rule to check if date_debut is before date_fin
$validator->after(function ($validator) use ($request) {
    $dateDebut = $request->input('date_debut');
    $dateFin = $request->input('date_fin');

    if ($dateDebut && $dateFin && $dateDebut >= $dateFin) {
        $validator->errors()->add('date_debut', 'La date de début doit être antérieure à la date de fin.');
    }
});
       // If validation fails, redirect back with error messages
    if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
        return Redirect::back()
            ->withErrors($validator)
            ->withInput();
    }

    // Create a new Formation
    $formation = Formation::create([
        'Intitulé' => $request->input('Intitulé'),
    ]);

    // Create a new PlanFormation and associate it with the Formation
    $planFormation = PlanFormation::create([
        'date_debut' => $request->input('date_debut'),
        'date_fin' => $request->input('date_fin'),
        'formation_id' => $formation->id,
        'planificateur_id' => Auth::id(),
    ]);

     // Sync the selected themes with the PlanFormation
     $themeIds = $request->input('theme_id');
     $planFormation->theme()->sync($themeIds);
     Toastr::success('Formation et PlanFormation créés avec succès.', 'Succès');

     return redirect()->route('planification.show', $formation->id);

    }

}
