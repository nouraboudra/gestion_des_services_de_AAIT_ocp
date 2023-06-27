<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Formation;
use App\Models\Groupe;
use App\Models\Salle;
use App\Models\SessionFormation;
use App\Models\Theme;
use Livewire\Component;

class SessionPlanification extends Component
{
  public $showFormations = true;
  public $showThemes = false;
  public $formationId;
  public $salles;
  public $events = '';
  public $domains;
  public $formation;
  public $groupes;

  public function mount($id)
  {
    $this->formationId = $id;
  }

  public function render()
  {
    $this->formation = Formation::findOrFail($this->formationId)->first();

    $sessions = SessionFormation::where('formation_id',  $this->formationId)->get();
    $this->events = $this->getSessions();
    $this->salles = Salle::all();
    $this->domains = Domain::all();
    $this->groupes = Groupe::all();

    return view('livewire.session-planification', [
      'events' => $this->events,
      'sessions' => $sessions,
      'salles' => $this->salles,
      'domains' =>  $this->domains,
      'groupes' =>  $this->groupes,
    ])->extends('layouts.contentNavbarLayout')->section('content');
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

  public function getSessions()
  {
    $colors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

    $events = [];

    $sessions = SessionFormation::where('formation_id',  $this->formationId)->get();

    foreach ($sessions as $key => $session) {
      $events[] = [
        'id' => $session->id,
        'title' => $session->formation->Intitulé . "-" . $session->salle->code,
        'start' => $session->date_debut,
        'end' => $session->date_fin,
        'color' => $colors[$key % count($colors)],  // Assign a color from the array.

      ];
    }

    return json_encode($events);
  }
}
