<?php

namespace App\Http\Livewire;

use App\Models\CandidatEcosysteme;
use App\Models\Groupe;
use Livewire\Component;
use Livewire\WithPagination;

class CandidatEcosystemeManagement extends Component
{
    use WithPagination;

    public $pageSize = 10;
    public $search = '';
    public $groupe_id;
    public $groupe;

    public function mount($id)
    {
        $this->groupe_id = $id;
        $this->groupe = Groupe::find($id);
    }
    public function render()
    {
        $candidats = CandidatEcosysteme::whereHas('candidat.groupe', function ($query) {
            $query->where('groupes.id', $this->groupe_id);
        })
            ->whereHas('candidat.user', function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                    ->orWhere('prenom', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->pageSize);
        return view("livewire.candidat-ecosysteme-management", compact('candidats'))->extends('layouts.contentNavbarLayout')
            ->section('content');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}