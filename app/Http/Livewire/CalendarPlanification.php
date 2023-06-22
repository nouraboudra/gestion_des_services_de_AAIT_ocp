<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalendarPlanification extends Component
{
    public function render()
    {
        return view('livewire.calendar-planification');
    }

    public $selectedDate;

    protected $listeners = ['eventAdded' => '$refresh'];

    public function addEvent()
    {
        // Logic to add the event to the calendar
        
        // Emit the custom event to notify other components
        $this->emit('eventAdded');
    }
}
