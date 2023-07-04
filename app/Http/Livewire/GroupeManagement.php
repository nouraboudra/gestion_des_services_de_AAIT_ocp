<?php

namespace App\Http\Livewire;

use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\CandidatOcp;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class GroupeManagement extends Component
{
    use WithPagination;

    public $page_size = 5;
    public $selectedCandidates = [];
    public $searchResults;
    public $userType = '';

    public $search = '';
    public $searchMembers = '';
    public $nom;
    public $capacite;


    protected $rules = [
        'nom' => 'required|string',
        'capacite' => 'required|integer|min:1',
    ];

    public function render()
    {
        $groupes = Groupe::where(function ($query) {
            $query->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('capacite', 'like', '%' . $this->search . '%');
        })->paginate($this->page_size);

        return view('livewire.groupe-management', compact('groupes'))
            ->extends('layouts.contentNavbarLayout')
            ->section('content');
    }

    public function saveGroupe()
    {
        $validator = Validator::make($this->toArray(), $this->rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                Toastr::error($message);
            }
            return;
        }

        $groupe = Groupe::create([
            'nom' => $this->nom,
            'capacite' => $this->capacite,
            'type' => $this->userType,

        ]);
        $groupe->candidats()->attach($this->selectedCandidates);

        $this->resetInputs();

        Toastr::success('Groupe has been created successfully!');

        $this->emit('hideModal');
    }

    public function deleteGroupe($groupeId)
    {
        $groupe = Groupe::findOrFail($groupeId);
        $groupe->delete();

        Toastr::success('Groupe has been deleted successfully!');
    }

    public function toArray()
    {
        return [
            'nom' => $this->nom,
            'capacite' => $this->capacite,
            'type' => $this->userType,
        ];
    }

    private function resetInputs()
    {
        $this->nom = '';
        $this->capacite = null;
        $this->userType = '';
        $this->searchMembers = '';
    }
    public function updatedSearchMembers()
    {
        $candidats = [];
        if ($this->userType === 'ocp') {
            $candidats = Candidat::whereHas('user', function ($query) {
                $query->where('nom', 'like', '%' . $this->searchMembers . '%')
                    ->orWhere('prenom', 'like', '%' . $this->searchMembers . '%')
                    ->orWhere('matricule', 'like', '%' . $this->searchMembers . '%');
            })
                ->where('candidatable_type', CandidatOcp::class)
                ->get();
            $candidats = $candidats->load('user');
        } elseif ($this->userType === 'ecosysteme') {
            $candidats = Candidat::whereHas('user', function ($query) {
                $query->where('nom', 'like', '%' . $this->searchMembers . '%')
                    ->orWhere('prenom', 'like', '%' . $this->searchMembers . '%')
                    ->orWhere('matricule', 'like', '%' . $this->searchMembers . '%');
            })
                ->where('candidatable_type', CandidatEcosysteme::class)
                ->get();
            $candidats = $candidats->load('user');
        }

        $this->emit('searchResultsUpdated', $candidats);
    }
}