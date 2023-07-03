<?php

namespace App\Http\Livewire;

use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\CandidatOcp;
use App\Models\Formateur;
use App\Models\Planificateur;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Absence;
use App\Models\Domain;
use App\Models\Formation;
use App\Models\Groupe;
use App\Models\Salle;
use App\Models\SessionFormation;
use App\Models\Theme;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $userCount;
    public $candidatCount;
    public $candidatOcpCount;
    public $candidatEcosystemeCount;
    public $adminCount;
    public $planificaterCount;
    public $formateurCount;

    public $absenceCountCurrentYear;
    public $absenceCountLastYear;
    public $absenceCountTwoYearsAgo;

    public $salleCount;
    public $themeCount;
    public $groupeCount;
    public $domainCount;
    public $formationCount;
    public $sessionCount;
    
    public function mount()
    {
        $this->userCount = User::count();
        $this->candidatCount = Candidat::count();
        $this->candidatOcpCount = CandidatOcp::count();
        $this->candidatEcosystemeCount = CandidatEcosysteme::count();
        $this->adminCount = Role::where('name', 'admin')->firstOrFail()->users()->count();
        $this->planificaterCount = Planificateur::count();
        $this->formateurCount = Formateur::count();


        $this->salleCount = Salle::count();
        $this->themeCount = Theme::count();
        $this->groupeCount = Groupe::count();
        $this->domainCount = Domain::count();
        $this->formationCount = Formation::count();
        $this->sessionCount = SessionFormation::count();
    }

    public function render()
    {

        $totalUsers = User::count();
        $percentCandidat = ($this->candidatCount / $totalUsers) * 100;
        $percentAdmin = ($this->adminCount / $totalUsers) * 100;
        $percentPlanificater = ($this->planificaterCount / $totalUsers) * 100;
        $percentFormateur = ($this->formateurCount / $totalUsers) * 100;


        $absencesCurrentYear = Absence::whereYear('date', Carbon::now()->year)
            ->groupBy(\DB::raw('MONTH(date)'))
            ->select(\DB::raw('MONTH(date) as month'), \DB::raw('count(id) as count'))
            ->orderBy('month')
            ->pluck('count')->toArray();

        $absencesLastYear = Absence::whereYear('date', Carbon::now()->subYear()->year)
            ->groupBy(\DB::raw('MONTH(date)'))
            ->select(\DB::raw('MONTH(date) as month'), \DB::raw('count(id) as count'))
            ->orderBy('month')
            ->pluck('count')->toArray();

        $absencesTwoYearsAgo = Absence::whereYear('date', Carbon::now()->subYears(2)->year)
            ->groupBy(\DB::raw('MONTH(date)'))
            ->select(\DB::raw('MONTH(date) as month'), \DB::raw('count(id) as count'))
            ->orderBy('month')
            ->pluck('count')->toArray();

        return view('livewire.dashboard', [
            'totalUsers' => $totalUsers,
            'percentCandidat' => $percentCandidat,
            'percentAdmin' => $percentAdmin,
            'percentPlanificater' => $percentPlanificater,
            'percentFormateur' => $percentFormateur,
            'absencesCurrentYear' => $absencesCurrentYear,
            'absencesLastYear' => $absencesLastYear,
            'absencesTwoYearsAgo' => $absencesTwoYearsAgo,
        ]);



    }
}