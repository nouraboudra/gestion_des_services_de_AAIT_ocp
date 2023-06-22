<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Planificateur;
use App\Models\Theme;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domain;
class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $planificateur = new Planificateur();
        $planificateur->user()->save($user);
        $planificateur->save();
        $domaine = new Domain();
        $domaine->nom = 'IT';
        $domaine->save();

        $theme = new Theme();
        $theme->nom = 'python';
        $theme->domain_id = $domaine->id;
        $theme = $theme->save();
        $formation = new Formation();
        $formation->Intitulé = 'python formation';
        $formation->date_debut = now()->startOfMonth();
        $formation->date_fin = now()->endOfMonth();
        $formation->planificateur_id = $planificateur->id;
        $formation->save();

    }
}
