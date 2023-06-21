<?php

namespace Database\Factories;


use App\Models\CandidatOcp;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CandidatOcp>
 */
class CandidatOcpFactory extends Factory
{
    protected $model = CandidatOcp::class;

    public function definition()
    {
        return [
            'Code_Emploi' => $this->faker->randomNumber(9),
            'Matricule' => $this->faker->unique()->numerify('############'),
            'Libelle_Code_Emploi' => $this->faker->randomElement,
            'Niveau_code_Emploi' => $this->faker->randomElement,
            'GROUPE_Professionnel' => $this->faker->randomElement,
            'service' => $this->faker->company,
            'Direction' => $this->faker->company,
            'societe' => $this->faker->company,

            
        ];
    }
}
