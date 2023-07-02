<?php

namespace App\Http\Livewire;

use App\Models\Absence;
use App\Models\Candidat;
use App\Models\Groupe;
use App\Models\SessionFormation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;
use Livewire\Component;
use App\Exports\CandidatesExport;
use Maatwebsite\Excel\Facades\Excel;

class PresenceManagement extends Component
{
    public $search = '';
    public $selectedCandidates = [];
    public $candidats = [];
    public $session;
    public $formateur;
    public $attendanceStatus = [];
    public $justifications = [];
    public $sessionCount = [];
    private $today;
    public $alreadySaved = false;
    public $selectedCandidat, $candidatToReplace;
    public $groupe;
    public $searchResults;
    public $replace = false;

    public function mount()
    {
        $this->today = Carbon::today();
        $this->formateur = Auth::user()->userable;

        // Retrieve the sessions of today for the formateur
        $this->session = SessionFormation::where('formateur_id', $this->formateur->id)
            ->whereDate('date_debut', $this->today)
            ->first();

        $this->sessionCount = SessionFormation::whereDate('date_debut', '<', $this->today)->where('formateur_id', $this->formateur->id)->count() + 1;
        if ($this->session) {
            $this->session = $this->session->load('groupe.candidats');
            $this->groupe = $this->session->groupe->load('candidats');
            $this->candidats = $this->session->groupe->candidats;

            // Initialize attendanceStatus and justifications arrays
            foreach ($this->candidats as $candidat) {
                $absence = Absence::where('candidat_id', $candidat->id)
                    ->whereDate('date', $this->today)
                    ->first();

                if ($absence) {
                    $this->attendanceStatus[$candidat->id] = 'absent';
                    $this->justifications[$candidat->id] = $absence->motif;
                } else {
                    $this->attendanceStatus[$candidat->id] = 'present';
                    $this->justifications[$candidat->id] = '';
                }
            }
        }
    }

    public function render()
    {
        if ($this->session && $this->alreadySaved) {
            $this->session = $this->session->load('groupe.candidats');
            $this->candidats = $this->session->groupe->candidats;

            // Initialize attendanceStatus and justifications arrays
            foreach ($this->candidats as $candidat) {
                $absence = Absence::where('candidat_id', $candidat->id)
                    ->whereDate('date', $this->today)
                    ->first();

                if ($absence) {
                    $this->attendanceStatus[$candidat->id] = 'absent';
                    $this->justifications[$candidat->id] = $absence->motif;
                } else {
                    $this->attendanceStatus[$candidat->id] = 'present';
                    $this->justifications[$candidat->id] = '';
                }
            }
        }

        return view('livewire.presence-management', [
            'session' => $this->session,
            'candidats' => $this->candidats,
            'sessionCount' => $this->sessionCount,
        ])
            ->extends('layouts.contentNavbarLayout')
            ->section('content');
    }

    public function deleteCandidat($candidatId)
    {

        $groupe = Groupe::find($this->groupe->id);
        $groupe->candidats()->detach([$candidatId]);
        toastr()->success("cadidat supprimé avec succes");
        $this->reset(['search']);
        $this->mount();
        $this->render();
    }

    public function selectCandidate($candidatId)
    {
        $this->selectedCandidat = Candidat::find($candidatId);
    }

    public function clearSelectedCandidat()
    {
        $this->selectedCandidat = null;
    }
    public function downloadExcel()
    {
        // get candidats ids
        $candidatsIds = $this->groupe->candidats->pluck('id')->toArray();

        // download the excel
        return Excel::download(new CandidatesExport($candidatsIds), 'candidats.xlsx');
    }

    public function setReplaceCandidat($oldCandidatId)
    {
        $this->replace = true;
        $this->candidatToReplace = $oldCandidatId;
    }
    public function replaceCandidat($candidatId)
    {
        $groupe = Groupe::find($this->groupe->id);
        $groupe->candidats()->detach([$this->candidatToReplace]);
        $groupe->candidats()->attach([$candidatId]);

        toastr()->success("cadidat remplacé avec succes");
        $this->reset(['search']);
        $this->emit('hideModal');

        $this->mount();
        $this->render();
        $this->replace = false;
    }
    public function setReplace($mode)
    {
        $this->replace = $mode;
        $this->render();
    }
    public function getReplace()
    {
        return $this->replace;
    }
    public function ReplaceCandidate()
    {
    }
    public function addToGroupe()
    {
        $groupe = Groupe::find($this->groupe->id);
        $groupe->candidats()->attach($this->selectedCandidates);
        toastr()->success("cadidats sont ajoutés avec succes");
        $this->emit('hideModal');
        $this->reset(['search']);
        $this->mount();
        $this->render();
    }

    public function saveAttendance()
    {
        $absentCandidats = collect($this->attendanceStatus)
            ->filter(function ($status) {
                return $status === 'absent';
            })
            ->keys();

        $presentCandidats = collect($this->attendanceStatus)
            ->filter(function ($status) {
                return $status === 'present';
            })
            ->keys();

        $today = Carbon::today();
        $absentCount = $absentCandidats->count();
        foreach ($absentCandidats as $candidatId) {
            $candidat = Candidat::find($candidatId);
            $session = SessionFormation::find($this->session->id);
            if ($candidat) {
                $justification = $this->justifications[$candidatId];

                $absence = new Absence();
                $absence->motif = $justification;
                $absence->date = $today;
                $absence->sessionFormation()->associate($session);
                $candidat->absences()->save($absence);
            }
        }
        foreach ($presentCandidats as $candidatId) {
            Absence::where('candidat_id', $candidatId)
                ->whereDate('date', $today)
                ->delete();
        }
        Toastr::success("L'absences sont enregistrées avec succès ({$absentCount})");
        return redirect()->back();
    }

    public function updatedSearch()
    {

        $existingCandidats = $this->groupe->candidats->pluck('id')->toArray();

        $candidats = Candidat::whereHas('user', function ($query) {
            $query->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('matricule', 'like', '%' . $this->search . '%');
        })
            ->whereNotIn('id', $existingCandidats)
            ->get();
        $candidats = $candidats->load('user');
        $this->emit('searchResultsUpdated', $candidats);
    }
}
