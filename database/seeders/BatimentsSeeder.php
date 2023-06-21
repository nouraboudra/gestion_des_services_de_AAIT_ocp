<?php

namespace Database\Seeders;

use App\Models\Batiment;
use Illuminate\Database\Seeder;

class BatimentsSeeder extends Seeder
{
    public function run()
    {
        $batiments = [
            'AtelierA' => 'Atelier A',
            'AtelierB' => 'Atelier B',
            'AtelierC' => 'Atelier C',
            'AtelierHSE' => 'Atelier HSE',
            'BlocM' => 'Bloc Maintenance',
            'BlocP' => 'Bloc Process',
            
        ];

        foreach ($batiments as $key => $value) {
            Batiment::create([
                'nom' => $value,
            ]);
        }
    }
}