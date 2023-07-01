<?php

namespace App\Http\Livewire;

use App\Http\Controllers\user_interface\Toasts;
use App\Models\Formateur;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class FormateursManagement extends Component
{
    use WithPagination;
    public $pageSize = 5;

    public $search = '';
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $matricule = '';


    protected $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'matricule' => 'nullable|string|max:255|unique:users',

    ];
    protected $messages = [
        'nom.required' => 'Le champ Nom est obligatoire.',
        'prenom.required' => 'Le champ Prénom est obligatoire.',
        'email.required' => 'Le champ Email est obligatoire.',
        'email.email' => 'Veuillez saisir une adresse e-mail valide.',
        'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
        'password.min' => 'Le champ mot de pass trés court, > 8 caractéres.',
        'password.required' => 'Le champ mot de pass est obligatoire.',
        'matricule.unique' => 'Le champ matricule est déja utilisée.',


    ];
    public function render()
    {
        $formateurs = Formateur::where(function ($query) {
            $query->whereHas('user', function ($userQuery) {
                $userQuery->where('nom', 'like', '%' . $this->search . '%')
                    ->orWhere('prenom', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('matricule', 'like', '%' . $this->search . '%');
            });
        })->paginate($this->pageSize);
        return view('livewire.formateurs-management', compact('formateurs'))->extends('layouts.contentNavbarLayout')->section('content');
    }

    public function saveFormateur()
    {
        $validator = Validator::make($this->toArray(), $this->rules, $this->messages);
        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                Toastr::error($message);
            }
            return;
        }
        $formateur = new Formateur();
        $user = new User();
        $user->nom = $this->nom;
        $user->prenom = $this->prenom;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->matricule = $this->matricule ? $this->matricule : '';
        $user->assignRole('formateur');
        $formateur->save();
        $formateur->user()->save($user);
        $this->resetInputs();
        Toastr::success('Formateur ' . $user->nom . ' est ajouté avec succés');

        $this->emit('hideModal');
        return redirect()->back();
    }

    public function deleteFormateur($formateurId)
    {
        $formateur = Formateur::findOrFail($formateurId);
        $nom = $formateur->user->nom;
        $formateur->user()->delete();
        $formateur->delete();
        Toastr::success('Formateur ' . $nom . ' est supprimé avec succés');
    }

    public function toArray()
    {
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password' => $this->password,
            'matricule' => $this->matricule,
        ];
    }
    private function resetInputs()
    {
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
    }
}