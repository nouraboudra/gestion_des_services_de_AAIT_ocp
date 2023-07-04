<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->query('search');
        $page_size = $request->query('page_size');

        $users = User::where(function ($query) use ($search) {
            $query->where('Matricule', 'like', '%' . $search . '%')
                ->orWhere('nom', 'like', '%' . $search . '%')
                ->orWhere('prenom', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate($page_size);
        return view('content.Admin.Admin-showuser')->with('users', $users);
    }
    public function create()
    {
        $roles = Role::all();
        return view('content.Admin.Admin-adduser')->with('roles', $roles);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'prenom' => 'required',
            'nom' => 'required',
            'password' => 'required',
            'date_naissance' => 'required|date',
            'date_embauche' => 'required|date',
        ], [
            'matricule.required' => 'Le champ Matricule est obligatoire.',
            'matricule.unique' => 'Le matricule saisi existe déjà.',
            'email.required' => 'Le champ Email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'email.unique' => 'L\'adresse e-mail saisie existe déjà.',
            'prenom.required' => 'Le champ Prénom est obligatoire.',
            'nom.required' => 'Le champ Nom est obligatoire.',
            'password.required' => 'Le champ Mot de passe est obligatoire.',
            'date_naissance.required' => 'Le champ Date de naissance est obligatoire.',
            'date_naissance.date' => 'Veuillez saisir une date de naissance valide.',
            'date_embauche.required' => 'Le champ Date d\'embauche est obligatoire.',
            'date_embauche.date' => 'Veuillez saisir une date d\'embauche valide.',
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();

            // Loop over the error messages and display a toast for each error
            foreach ($errors->all() as $error) {
                // Show a toast error message
                toastr()->error($error);
            }

            return redirect()->back();
        }

        // Create a new User instance
        $user = new User();
        $user->matricule = $request->input('matricule');
        $user->email = $request->input('email');
        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->password = Hash::make($request->input('password'));
        $user->date_naissance = $request->input('date_naissance');
        $user->date_embauche = $request->input('date_embauche');

        // Save the user
        $user->save();
        // Handle roles assignment
        if ($request->has('roles')) {
            $roles = $request->input('roles');
            $user->roles()->sync($roles);
            $roles = Role::whereIn('id', $roles)->get();
            foreach ($roles as $role) {
                switch ($role->name) {
                    case 'candidat_ecosysteme':

                        $candidat = new Candidat();
                        $candidat_ecoSystem = new CandidatEcosysteme();
                        $candidat_ecoSystem->CIN = $user->matricule;
                        $candidat_ecoSystem->save();
                        $candidat_ecoSystem->candidat()->save($candidat);
                        $candidat->user()->save($user);

                        break;

                    default:
                        # code...
                        break;
                }
            }
        }
        toastr()->success("utilisateur créer avec succes");
        // Redirect or perform any other actions as needed
        return redirect()->route("admin.users.index");
    }

    public function show(User $user)
    {
        // Logic to retrieve and display a specific user
    }

    public function edit(User $user)
    {
        // Logic to display the edit user form
    }

    public function update(Request $request, User $user)
    {
        // Logic to validate and update an existing user
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        toastr()->success("l'utilisateur' " . $user->name . " est supprimé avec succes");
        return redirect()->back();
    }
}