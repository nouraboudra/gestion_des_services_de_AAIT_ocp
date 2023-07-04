<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Yoeunes\Toastr\Facades\Toastr;

class UsersManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $page_size = 10;



    public function render()
    {
        $users = User::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('prenom', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('matricule', 'like', '%' . $this->search . '%')
            ->paginate($this->page_size);

        return view('livewire.users-management', compact('users'))->extends('layouts.contentNavbarLayout')->section('content');
    }

    public function delete($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            Toastr::success('User deleted successfully.');
        } else {
            Toastr::error('User not found.');
        }
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}