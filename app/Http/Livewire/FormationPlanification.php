<?php

namespace App\Http\Livewire;

use App\Models\Theme;
use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Exports\FormationsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Storage;

class FormationPlanification extends Component
{
  use WithPagination;


  public $page_size = 5;

  public $search = '';

  public $showFormations = true;
  public $showThemes = false;
  public $events = '';
  public $isModalOpen = false;

  public $count = 10;
  public $title, $start, $end, $theme_ids = [];
  public $showModal = false;
  public $themes = [];

  public function render()
  {
    $formations = Formation::where(function ($query) {
      $query->where('Intitulé', 'like', '%' . $this->search . '%')
        ->orWhere('date_debut', 'like', '%' . $this->search . '%')
        ->orWhere('date_fin', 'like', '%' . $this->search . '%');
    })->paginate($this->page_size);
    $this->events = $this->getFormations();
    $this->themes = Theme::all();

    return view('livewire.formation-planification', [
      'formations' => $formations
    ])->extends('layouts.contentNavbarLayout')->section('content');
  }
  public function showModal()
  {
    $this->validate(); // Perform real-time validation
    $this->showModal = true; // Show the modal
  }
  public function updatingSearch(): void
  {
    $this->resetPage();
  }
  public function getFormations()
  {
    $colors = ['#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

    $events = [];
    $formations = Formation::select('id', 'Intitulé as title', 'date_debut as start', 'date_fin as end')->paginate($this->page_size);
    foreach ($formations as $key => $formation) {
      $events[] = [
        'id' => $formation->id,
        'title' => $formation->title,
        'start' => $formation->start,
        'end' => $formation->end,
        'color' => $colors[$key % count($colors)], // Assign a color from the array.

      ];
    }
    return json_encode($events);
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

    $this->emit('refreshCalendar');
    $this->emit('hideModal');
  }



  public function downloadFormations()
  {
    return Excel::download(new FormationsExport, 'formations.xlsx');
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

  public function downloadPDF()
  {
    $formations = Formation::with('sessionFormations')->get();
    $pdf = Pdf::loadView('pdf.schedule', ['formations' => $formations]);
    $pdf->setPaper('A4', 'landscape');

    $output = $pdf->output();
    $fileName = 'schedule.pdf';
    Storage::put('public/' . $fileName, $output);
    $this->emit('download', $fileName);
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