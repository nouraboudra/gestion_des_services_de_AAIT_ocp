<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EcosystemSeeder extends Seeder
{
    public function run()
    {
        $candidatEcosystemeRole = new Role();
        $candidatEcosystemeRole->name = "candidat_ecosysteme";
        $candidatEcosystemeRole->save();

        $user = User::factory()->create();
        $candidat = new Candidat();
        $ecosys = CandidatEcosysteme::factory()->create();

        $user->matricule = $ecosys->CIN;
        $user->password = Hash::make("test");
        $ecosys->candidat()->save($candidat);
        $candidat->user()->save($user);
    }
}
