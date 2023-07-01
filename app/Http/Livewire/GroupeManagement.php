<?php

namespace App\Http\Livewire;

use App\Models\Groupe;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class GroupeManagement extends Component
{
    use WithPagination;

    public $pageSize = 5;
    public $search = '';
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
        })->paginate($this->pageSize);

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

        Groupe::create([
            'nom' => $this->nom,
            'capacite' => $this->capacite,
        ]);

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
        ];
    }

    private function resetInputs()
    {
        $this->nom = '';
        $this->capacite = null;
    }
}