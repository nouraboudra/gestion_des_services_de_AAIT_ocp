<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypesSalle>
 */
class TypesSalleFactory extends Factory
{
    protected $model = TypesSalle::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
        ];
    }
}
