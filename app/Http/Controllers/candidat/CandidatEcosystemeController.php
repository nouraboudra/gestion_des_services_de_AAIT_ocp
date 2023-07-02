<?php

namespace App\Http\Controllers\candidat;

use App\Http\Controllers\Controller;
use App\Imports\CandidatEcosystemeImport;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;

use App\Imports\UserImport;


use Illuminate\Support\Facades\Hash;



class CandidatEcosystemeController extends Controller
{


    public function index(Request $request)
    {
        $pageSize = $request->input('page_size', 10); // Default page size is 10

        $users = User::with('roles')->get();
        $candidats = CandidatEcosysteme::paginate($pageSize);
        return view("content.management.candidat-ecosysteme-index", compact('candidats', 'pageSize'));
    }

    public function create()
    {
        $roles = Role::where('name', 'candidat_ecosysteme')->get(); // Fetching only 'candidat_ecosysteme' role
        return view('content.management.candidat-ecosysteme-create', compact('roles'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'prenom' => 'required',
            'nom' => 'required',
            'password' => 'required',
        ], [
            'matricule.required' => 'Le champ Matricule est obligatoire.',
            'matricule.unique' => 'Le matricule saisi existe déjà.',
            'email.required' => 'Le champ Email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'email.unique' => 'L\'adresse e-mail saisie existe déjà.',
            'prenom.required' => 'Le champ Prénom est obligatoire.',
            'nom.required' => 'Le champ Nom est obligatoire.',
            'password.required' => 'Le champ Mot de passe est obligatoire.',

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


        // Save the user
        $user->save();
        // Handle roles assignment
        if ($request->has('roles')) {
            $roles = $request->input('roles');
            if (!is_array($roles)) {
                $roles = [$roles]; // Convert string to array
            }
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
                        // Handle other roles if needed
                        break;
                }
            }
        }
        toastr()->success("utilisateur créer avec succes");
        // Send email notification to the user
        $matricule = $request->input('matricule');
        $password = $request->input('password');
        $email = $request->input('email');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $data = [
            'matricule' => $matricule,
            'password' => $password,
            'nom' => $nom,
            'prenom' => $prenom,
        ];

        Mail::to($email)->send(new NewUserNotification($data));

        // Redirect or perform any other actions as needed
        return redirect()->route('candidatEcosysteme.index');
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv',
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

        // Handle Excel import if a file is provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $import = new CandidatEcosystemeImport();
            Excel::import($import, $file);

            // Get the imported users
            $users = $import->getUsers();

            // Process each user and send email notifications
            foreach ($users as $user) {
                $data = [
                    'matricule' => $user['matricule'],
                    'password' => $user['password'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                ];

                Mail::to($user['email'])->send(new NewUserNotification($data));
            }
        }

        // Redirect or perform any other actions as needed
        return redirect()->route('candidatEcosysteme.index');
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