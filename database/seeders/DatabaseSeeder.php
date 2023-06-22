<?php

namespace Database\Seeders;

use App\Models\Batiment;
use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\TypeSalle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    
    public function run()
    {
        //\App\Models\User::factory(30)->create();

        //$this->call(PermissionsSeeder::class);
        //$this->call(BatimentsSeeder::class);
        //$this->call(TypesSalleSeeder::class);
        //$this->call(EcosystemSeeder::class);
       // $this->call(CandidatOcpSeeder::class);
        //$this->call(FormationSeeder::class);
        $this->call(SalleSeeder::class);
        //$this->call(GroupeSeeder::class);

    }
}
