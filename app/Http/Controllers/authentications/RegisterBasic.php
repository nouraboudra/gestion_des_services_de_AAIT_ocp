<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
class RegisterBasic extends Controller
{
  public function index($userId)
  {
    $ecoUser = CandidatEcosysteme::where('cin', $userId)->firstOrFail();
    
    return view('content.authentications.auth-register-basic')->with('ecoUser',$ecoUser);
  }


  public function store(Request $request)
  {
    
      // Validation rules for the fields
      $rules = [
          'id' => 'required|exists:users,id',
          'Type_contrat' => 'required|string|max:255',
          'Type_contrat_autre' => 'nullable|string|max:255',
          'Societe' => 'required|string|max:255',
          'Niveau_scolaire' => 'required|string|max:255',
          'Niveau_scolaire_autre' => 'nullable|string|max:255',
          'Diplôme' => 'required|string|max:255',
          'password' => 'required|string|max:255',
          'Diplôme_autre' => 'nullable|string|max:255',
          'Spécialité' => 'required|string|max:255',
          'Spécialité_autre' => 'nullable|string|max:255',
          'Langues' => 'required|string|max:255',
          'Langues_autre' => 'nullable|string|max:255',
      ];
  
      // Apply the validation rules
     
      $messages = [
        'id.required' => "Le champ ID est obligatoire.",
        'id.exists' => "L'utilisateur n'existe pas.",
        'Type_contrat.required' => "Le champ Type de contrat est obligatoire.",
        'Niveau_scolaire.required' => "Le champ Niveau scolaire est obligatoire.",
        'Diplôme.required' => "Le champ Diplôme est obligatoire.",
        'Societe.required' => "Le champ Societe est obligatoire.",
        'password.required' => "Le champ Mot de passe est obligatoire.",
        'Spécialité.required' => "Le champ Spécialité est obligatoire.",
        'Langues.required' => "Le champ Langues est obligatoire.",
    ];
    $userId = $request->input('CIN'); // CIN is the matricule for Ecosysteme users
    $user = User::where('Matricule', $userId)->firstOrFail();

    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
      $errors = $validator->errors();

      foreach ($errors->all() as $error) {
        toastr()->error($error);
    }
    
    return redirect()->back()->withErrors($validator);
  }
      // Retrieve the user ID from the form
      
  
      // Find the user by ID
      $ecosystemeRole= Role::where('name', "candidat_ecosysteme")->get()->firstOrFail();
      $user->assignRole($ecosystemeRole);
      $user->save();
      if (!$user) {
        toastr()->error("l'utilisateur n'existe pas");

        return redirect()->back()->withErrors("l'utilisateur n'existe pas");
      }
      $candidat = $user->userable;
      $candidatEcosystem = CandidatEcosysteme::where('cin',$userId)->firstOrFail();
      if (!$candidatEcosystem) {
        $candidatEcosystem = new CandidatEcosysteme();
      }
      if (!$candidat) {
        $candidat = new Candidat();
        $user->userable()->save($candidat);
    }
      // Create a new instance of the CandidatEcosystem model
      
      // Set the candidat_ecosystem attributes
      $candidatEcosystem->annees_experience = $request->input('annees_experience');
      $candidatEcosystem->Entreprise_actuelle = $request->input('Entreprise_actuelle');
      $candidatEcosystem->Poste_actuellement_occupe = $request->input('Poste_actuellement_occupe');
      $candidatEcosystem->Type_contrat = $request->input('Type_contrat');
      $candidatEcosystem->Niveau_scolaire = $request->input('Niveau_scolaire');
      $candidatEcosystem->Diplôme = $request->input('Diplôme');
      $candidatEcosystem->Spécialité = $request->input('Spécialité');
      $candidatEcosystem->Langues = $request->input('Langues');
      $candidatEcosystem->Anciennete = $request->input('Anciennete');
      $candidatEcosystem->Organismes_de_diplôme = $request->input('Organismes_de_diplôme');
      $candidatEcosystem->Organisme_de_formation = $request->input('Organisme_de_formation');
      $user->password = Hash::make($request->input('password'));
      $candidatEcosystem->first_time = false; // Set first_time to false since the user is completing the form
      $candidatEcosystem->agreed =  $request->input('terms') ? True : False;
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
      
      $candidatEcosystem->candidat()->save($candidat);
      $candidatEcosystem->save();
      // Save the candidat_ecosystem to the database
      $candidat->user()->save($user);
      $candidat->save();
      // Log in the user
      auth()->login($user);
      toastr()->success('Bienvenue '. $user->nom);
      // Redirect to the desired page after successful registration
      return redirect()->route('dashboard-analytics');
  }
  
}
