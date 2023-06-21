<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\CandidatOcp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CandidatOcpSeeder extends Seeder
{       
    public function run()
    {
        $candidatOcpRole = new Role();
        $candidatOcpRole->name = "candidat_ocp";
        $candidatOcpRole->save();

        $user = User::factory()->create();
        $candidat = new Candidat();
        $ocps = CandidatOcp::factory()->create();

       
        $user->matricule = $ocps->Matricule;
        $user->password = Hash::make("test");
        $ocps->candidat()->save($candidat);
        $candidat->user()->save($user);
    }
}
