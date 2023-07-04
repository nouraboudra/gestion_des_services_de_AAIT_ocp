<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\CandidatOcp;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Groupe::factory()->count(5)->create()->each(function ($groupe) {
            User::factory()->count(10)->create()->each(function ($user) use ($groupe) {
                $user->assignRole('candidat_ocp');
                $candidatOcp = CandidatOcp::factory()->create();
                $candidat = new Candidat();
                $candidatOcp->candidat()->save($candidat);

                $candidat->save();
                $candidat->user()->save($user);
                $groupe->candidats()->attach($candidat);
                $user->save();
            });
        });
    }
}