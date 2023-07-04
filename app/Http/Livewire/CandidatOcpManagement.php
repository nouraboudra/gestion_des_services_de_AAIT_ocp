<?php

namespace App\Http\Livewire;

use App\Models\CandidatOcp;
use App\Models\Groupe;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Contracts\Role;

class CandidatOcpManagement extends Component
{
    use WithPagination;

    public $page_size = 10;
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
        $candidats = CandidatOcp::whereHas('candidat.groupe', function ($query) {
            $query->where('groupes.id', $this->groupe_id);
        })
            ->whereHas('candidat.user', function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                    ->orWhere('prenom', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->page_size);

        return view("livewire.candidat-ocp-management", compact('candidats'))->extends('layouts.contentNavbarLayout')
            ->section('content');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}