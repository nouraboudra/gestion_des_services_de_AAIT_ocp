<?php

namespace App\Http\Livewire;

use App\Models\Theme;
use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormationPlanification extends Component
{
    public $showFormations = true;
    public $showThemes = false;
    public $events = '';
    public $count = 10;
    public $Intitulé, $date_debut, $date_fin, $theme_id;

    public $themes;
    public function render()
    {   

        $formations = Formation::all();
        $events = $this->getCalendarEvents();
        $this->events = json_encode($events);
        $this->themes = Theme::all();

        return view('livewire.formation-planification', [
            'events' => $events,
            'formations' =>$formations,
            'themes'=> $this->themes,
        ])->extends('layouts.contentNavbarLayout')->section('content');
    }

    public function saveFormation() {
        // Validate the input
        $this->validate([
            'Intitulé' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'theme_id' => 'required|exists:themes,id'
        ]);
    
        // Create a new Formation
        $formation = new Formation();
        $formation->Intitulé = $this->Intitulé;
        $formation->date_debut = $this->date_debut;
        $formation->date_fin = $this->date_fin;
        $formation->theme_id = $this->theme_id;
        $formation->planificateur_id = Auth::id() ? Auth::id():1 ;
        // Save the Formation
        $formation->save();
        // Reset the input fields
        $this->reset(['Intitulé', 'date_debut', 'date_fin', 'theme_id']);
    
         // Manually render the component
    $this->render();
    }

   
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Intitulé' => 'required|string|max:20',
            'date_debut' => 'required|date',
            'date_fin' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if ($this->date_debut && $value <= $this->date_debut) {
                        $fail('The end date must be after the start date.');
                    }
                }
            ],
        ]);

    }

    public function getFormations()
    {   
        $formations = Formation::all();

        return  json_encode($formations);
    }
   

    public function getCalendarEvents()
{   
     $colors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

    $events = [];
    
    $formationEvents = Formation::all();

    foreach ($formationEvents as $key => $formation) {
        $events[] = [
            'id' => $formation->id,
            'title' => $formation->Intitulé,
            'start' => $formation->date_debut,
            'end' => $formation->date_fin,
            'color' => $colors[$key % count($colors)],  // Assign a color from the array.

        ];
    }

    return json_encode($events);
}

    public function showFormations(){
        $this->showFormations = true;
        $this->showThemes = false;
    }

    public function showThemes(){
        $this->showFormations = false;
        $this->showThemes = true;
    }
}
