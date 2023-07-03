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
    $adminRole = Role::where('name', 'admin')->first();

    User::factory()->count(5)->create()->each(function ($user) use ($adminRole) {
      $user->roles()->attach( $adminRole->id);
    });
  }
}
