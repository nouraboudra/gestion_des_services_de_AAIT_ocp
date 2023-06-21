<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'candidat.afficher',
            'candidat.ajouter',
            'candidat.modifier',
            'candidat.supprimer',
            'facture.afficher',
            'facture.ajouter',
            'facture.modifier',
            'facture.supprimer',
            'user.afficher',
            'user.ajouter',
            'user.modifier',
            'user.supprimer',
            'role.afficher',
            'role.ajouter',
            'role.modifier',
            'role.supprimer',
            'absence.afficher',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}