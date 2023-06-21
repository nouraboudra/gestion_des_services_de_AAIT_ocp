<?php

namespace Database\Seeders;

use App\Models\TypeSalle;
use App\Models\TypesSalle;
use Illuminate\Database\Seeder;

class TypesSalleSeeder extends Seeder
{
    public function run()
    {
        $typesSalle = [
            'Atelier' => 'Atelier',
            'Labo' => 'Laboratoire',
            'SalleFormation' => 'Salle de formation',
          
        ];

        foreach ($typesSalle as $key => $value) {
            TypesSalle::create([
                'nom' => $value,
            ]);
        }
    }
}
