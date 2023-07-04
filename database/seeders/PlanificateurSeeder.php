<?php

namespace Database\Seeders;

use App\Models\Planificateur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanificateurSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->count(5)->create()->each(function ($user) {
      $planificateur = new Planificateur();
      $planificateur->save();
      $user->assignRole('planificateur');
      $planificateur->user()->save($user);
      $user->save();
    });
  }
}