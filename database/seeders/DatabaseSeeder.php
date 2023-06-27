<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


  public function run()
  {
    //\App\Models\User::factory(30)->create();

    $this->call(PermissionsSeeder::class);
    $this->call(BatimentsSeeder::class);
    $this->call(TypesSalleSeeder::class);
    $this->call(EcosystemSeeder::class);
    $this->call(CandidatOcpSeeder::class);
    $this->call(FormationSeeder::class);
    $this->call(SalleSeeder::class);
    $this->call(GroupeSeeder::class);
    $this->call(RolesSeeder::class);
    $this->call(UserSeeder::class);
  }
}
