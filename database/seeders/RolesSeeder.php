<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'formateur',
            'candidat_ocp',
            'candidat_ecosysteme',
            'planificateur',
            'admin',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}