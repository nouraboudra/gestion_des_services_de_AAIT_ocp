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
  public $isModalOpen = false;

  public $count = 10;
  public $title, $start, $end, $theme_ids = [], $formations = [];
  public $showModal = false;


  public function render()
  {
    $this->formations = Formation::all();
    $this->events = $this->getFormations();
    $this->themes = Theme::all();

    return view('livewire.formation-planification', [
      'events' => $this->events,
      'themes' => $this->themes,
    ])->extends('layouts.contentNavbarLayout')->section('content');
  }
  public function showModal()
  {
    $this->validate(); // Perform real-time validation
    $this->showModal = true; // Show the modal
  }

  public function getFormations()
  {
    $colors = ['#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

    $events = [];
    $formations = Formation::select('id', 'Intitulé as title', 'date_debut as start', 'date_fin as end')
      ->get();
    foreach ($formations as $key => $formation) {
      $events[] = [
        'id' => $formation->id,
        'title' => $formation->title,
        'start' => $formation->start,
        'end' => $formation->end,
        'color' => $colors[$key % count($colors)],  // Assign a color from the array.

      ];
    }
    return  json_encode($events);
  }



  public function eventDrop($formation, $oldFormation)
  {
    $formationData = Formation::find($formation['id']);
    $formationData->date_debut = $formation['start'];
    $formationData->date_fin = $formation['end'];
    $formationData->save();
  }

  public function saveFormation()
  {
    // Create a new Formation
    try {
      $formation = new Formation();
      $formation->Intitulé = $this->title;
      $formation->date_debut = $this->start;
      $formation->date_fin = $this->end;

      $formation->planificateur_id = Auth::user()->userable_id;
      $formation->save();
      $formation->theme()->sync($this->theme_ids);
    } catch (\Throwable $th) {
      dd($th);
    }

    // Reset the input fields
    $this->reset(['title', 'start', 'end', 'theme_ids']);
    toastr()->success("formation " . $formation->Intitulé . " est ajouté avec succes");

    redirect()->back();
    $this->emit('hideModal');

    $this->emit('refreshCalendar');
  }



  public function deleteFormation($id)
  {
    $formation = Formation::find($id);
    toastr()->success("formation " . $formation->Intitulé . " est supprimé avec succes");
    $formation->delete();
    redirect()->back();
    $this->emit('refreshCalendar');
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName, [
      'title' => 'required|string|max:20',
      'start' => 'required|date',
      'end' => [
        'required',
        'date',
        function ($attribute, $value, $fail) {
          if ($this->end && $value <= $this->start) {
            $fail('The end date must be after the start date.');
          }
        }
      ],

    ]);
  }




  public function showFormations()
  {
    $this->showFormations = true;
    $this->showThemes = false;
  }

  public function showThemes()
  {
    $this->showFormations = false;
    $this->showThemes = true;
  }
}
