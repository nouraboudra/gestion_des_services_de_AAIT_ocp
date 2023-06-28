<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Groupe;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\SessionFormation;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SessionPlanification extends Component
{
  public $showFormations = true;
  public $showThemes = false;
  public $modification = false;
  public $formation_id;
  public $salles  = [], $domains,  $formation, $groupes = [], $sessions, $formateurs  = [];
  public $salle_id, $domain_id, $groupe_id, $start, $formateur_id;

  public $events = '';

  public function mount($id)
  {
    $this->formation_id = $id;
  }

  public function render()
  {
    $this->formation = Formation::findOrFail($this->formation_id)->first();
    $this->sessions = SessionFormation::where('formation_id',  $this->formation_id)->get();
    $this->events = $this->getSessions();
    $this->domains = Domain::all();

    return view('livewire.session-planification')->extends('layouts.contentNavbarLayout')->section('content');
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

    $sessions = SessionFormation::where('formation_id',  $this->formation_id)->get();

    foreach ($sessions as $key => $session) {
      $events[] = [
        'id' => $session->id,
        'title' => $session->salle->code . "-" . $session->formation->Intitulé,
        'start' => $session->date_debut,
        'end' => $session->date_fin,
        'color' => $colors[$key % count($colors)],  // Assign a color from the array.

      ];
    }

    return json_encode($events);
  }

  public function eventDrop($session, $oldSession)
  {
    $sessionData = SessionFormation::find($session['id']);
    $sessionData->date_debut = explode("T", $session['start'])[0];
    $sessionData->date_fin =  explode("T", $session['start'])[0];
    $sessionData->save();
    redirect()->back();
  }

  public function updatedStart()
  {
    $date = $this->start;
    $this->salles = Salle::whereDoesntHave('reservations', function ($query) use ($date) {
      $query->whereDate('date_debut', '<=', $date)
        ->whereDate('date_fin', '>=', $date);
    })
      ->get();


    $this->groupes = Groupe::whereDoesntHave('sessionFormations', function ($query) use ($date) {
      $query->whereDate('date_debut', '<=', $date)
        ->whereDate('date_fin', '>=', $date);
    })
      ->get();

    $this->formateurs = Formateur::whereDoesntHave('sessionFormations', function ($query) use ($date) {
      $query->whereDate('date_debut', '<=', $date)
        ->whereDate('date_fin', '>=', $date);
    })
      ->get();

    $this->formateurs = $this->formateurs->load('user');
    $this->groupe_id = '';
    $this->salle_id = '';
    $this->formateur_id = '';


    // Emit the event with the necessary data
    $this->emit('dateUpdated', ['salles' => $this->salles, 'groupes' => $this->groupes, 'formateurs' => $this->formateurs]);
  }


  public function saveSession()
  {
    // Create a new Formation
    try {
      $session = new SessionFormation();
      $session->formation_id = $this->formation_id;
      $session->date_debut = $this->start;
      $session->date_fin = $this->start;
      $session->salle_id = $this->salle_id;
      $session->groupe_id = $this->groupe_id;
      $session->formateur_id = $this->formateur_id;

      $reservation = new Reservation();
      $reservation->date_debut = $this->start;
      $reservation->date_fin = $this->start;
      $reservation->responsable_logistique_user_id = Auth::id();
      $salle = Salle::findOrFail($this->salle_id);

      $reservation->salle()->associate($salle);
      $session->save();
      $reservation->save();
    } catch (\Throwable $th) {
      dd($th);
    }

    // Reset the input fields
    $this->reset(['salles', 'domains', 'formation', 'groupes', 'sessions', 'formateurs']);
    $this->reset(['salle_id', 'domain_id', 'groupe_id', 'start', 'formateur_id']);
    toastr()->success("formation " . $session->formation->Intitulé . " est ajouté avec succes");

    redirect()->back();
    $this->emit('hideModal');
    $this->emit('refreshCalendar');
  }

  public function deleteSession($id)
  {
    $session = SessionFormation::find($id);
    toastr()->success("session de formation " . $session->formation->Intitulé . " est supprimé avec succes");
    $session->delete();
    redirect()->back();
    $this->emit('refreshCalendar');
  }

  public function editSession($id)
  {
    try {
      $session = SessionFormation::findOrFail($id);

      $this->modification = true;
      $this->salle_id = $session->salle_id;
      $this->groupe_id = $session->groupe_id;
      $this->start = $session->date_debut;
      $this->formateur_id = $session->formateur_id;

      $this->updatedStart();
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  public function updateSession($id)
  {
    $session = SessionFormation::findOrFail($id);

    $session->salle_id = $this->salle_id;
    $session->groupe_id = $this->groupe_id;
    $session->date_debut = $this->start;
    $session->date_fin = $this->start;
    $session->formateur_id = $this->formateur_id;

    $session->save();

    $this->reset(['salles', 'domains', 'formation', 'groupes', 'sessions', 'formateurs']);
    $this->reset(['salle_id', 'domain_id', 'groupe_id', 'start', 'formateur_id']);
    toastr()->success("La session de formation a été mise à jour avec succès");

    redirect()->back();
    $this->emit('hideModal');
    $this->emit('refreshCalendar');
  }
}