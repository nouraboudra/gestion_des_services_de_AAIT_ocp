<?php

namespace Database\Factories;

use App\Models\Batiment;
use App\Models\TypesSalle;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Salle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    protected $model = Salle::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->numerify('####'),
            'intitule' => $this->faker->sentence(3),
            'batiment_id' => Batiment::all()->random()->id,
            'typesalle_id' => TypesSalle::all()->random()->id,
        ];
    }
}
