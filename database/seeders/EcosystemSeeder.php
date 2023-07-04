<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Faker\Generator as Faker;

class EcosystemSeeder extends Seeder
{
    public function run()
    {

        $user = User::factory()->create();
        $user->assignRole('candidat_ecosysteme');
        $candidat = new Candidat();

        $ecosys = CandidatEcosysteme::factory()->create();

        $user->matricule = $ecosys->CIN;
        $user->password = Hash::make("test");

        $user->email = User::where('email', "noura.boudra1@gmail.com")->first() ? $user->email : "noura.boudra1@gmail.com";
        $ecosys->candidat()->save($candidat);
        $candidat->user()->save($user);
    }
}