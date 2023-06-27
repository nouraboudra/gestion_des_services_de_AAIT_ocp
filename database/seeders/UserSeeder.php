<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = Role::all();

    User::factory()->count(5)->create()->each(function ($user) use ($roles) {
      $user->roles()->attach($roles->random());
    });
  }
}
