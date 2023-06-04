<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }


  public function store(Request $request)
  {
      // Validation rules for the fields
      $rules = [
          'id' => 'required|exists:users,id',
          'Type_contrat' => 'required|string|max:255',
          'Type_contrat_autre' => 'nullable|string|max:255',
          'Niveau_scolaire' => 'required|string|max:255',
          'Niveau_scolaire_autre' => 'nullable|string|max:255',
          'Diplôme' => 'required|string|max:255',
          'Diplôme_autre' => 'nullable|string|max:255',
          'Spécialité' => 'required|string|max:255',
          'Spécialité_autre' => 'nullable|string|max:255',
          'Langues' => 'required|string|max:255',
          'Langues_autre' => 'nullable|string|max:255',
          'terms' => 'required|accepted',
      ];
  
      // Apply the validation rules
      $request->validate($rules);
  
      // Retrieve the user ID from the form
      $userId = $request->input('id');
  
      // Find the user by ID
      $user = User::findOrFail($userId);
  
      // Update the user's matricule with the CIN value
      $user->matricule = $request->input('CIN');
      $user->save();
      if (!$user) {
        toastr()->error("l'utilisateur n'existe pas");

        return redirect()->back()->withErrors("l'utilisateur n'existe pas");
      }
      $candidat = $user->userable;
      if (!$candidat) {
        $candidat = new Candidat();
        $user->userable()->save($candidat);
    }
      // Create a new instance of the CandidatEcosystem model
      $candidatEcosystem = new CandidatEcosysteme();
  
      // Set the candidat_ecosystem attributes
      $candidatEcosystem->CIN = $request->input('CIN');
      $candidatEcosystem->Entreprise_actuelle = $request->input('Entreprise_actuelle');
      $candidatEcosystem->Poste_actuellement_occupe = $request->input('Poste_actuellement_occupe');
      $candidatEcosystem->Type_contrat = $request->input('Type_contrat');
      $candidatEcosystem->Niveau_scolaire = $request->input('Niveau_scolaire');
      $candidatEcosystem->Diplôme = $request->input('Diplôme');
      $candidatEcosystem->Spécialité = $request->input('Spécialité');
      $candidatEcosystem->Langues = $request->input('Langues');
      $candidatEcosystem->password = Hash::make($request->input('password'));
      $candidatEcosystem->first_time = false; // Set first_time to false since the user is completing the form
  
      // Check if the "Autre" option is selected for Type_contrat and save the autre value if provided
      if ($request->input('Type_contrat') === 'Autre') {
          $candidatEcosystem->Type_contrat = $request->input('Type_contrat_autre');
      }
  
      // Check if the "Autre" option is selected for Niveau_scolaire and save the autre value if provided
      if ($request->input('Niveau_scolaire') === 'Autre') {
          $candidatEcosystem->Niveau_scolaire = $request->input('Niveau_scolaire_autre');
      }
  
      // Check if the "Autre" option is selected for Diplôme and save the autre value if provided
      if ($request->input('Diplôme') === 'Autre') {
          $candidatEcosystem->Diplôme = $request->input('Diplôme_autre');
      }
  
      // Check if the "Autre" option is selected for Spécialité and save the autre value if provided
      if ($request->input('Spécialité') === 'Autre') {
          $candidatEcosystem->Spécialité = $request->input('Spécialité_autre');
      }
  
      // Check if the "Autre" option is selected for Langues and save the autre value if provided
      if ($request->input('Langues') === 'Autre') {
          $candidatEcosystem->Langues = $request->input('Langues_autre');
      }
      $candidatEcosystem->save();
      $candidat->candidatEcosystem()->save($candidatEcosystem);
      // Save the candidat_ecosystem to the database
      $user->Candidat()->save($candidat);
  
      // Log in the user
      auth()->login($user);
      toastr()->success('Bienvenue '. $user->nom);
      // Redirect to the desired page after successful registration
      return redirect()->route('dashboard-analytics');
  }
  
}
