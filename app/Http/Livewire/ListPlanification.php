<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListPlanification extends Component
{

    protected $listeners = ['eventAdded'];

    public function eventAdded()
    {
        
    }
    public function render()
    {
        return view('livewire.list-planification');
    }
}
