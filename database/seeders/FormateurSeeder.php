<?php

namespace Database\Seeders;

use App\Models\Formateur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormateurSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    User::factory()->count(5)->create()->each(function ($user) {
      $formateur = new Formateur();
      $formateur->save();
      $user->assignRole('formateur');
      $formateur->user()->save($user);
    });
  }
}
