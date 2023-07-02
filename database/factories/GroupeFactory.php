<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupe>
 */
class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => 'Groupe ' . $this->faker->unique()->word,
            'capacite' => $this->faker->numberBetween(20, 40),
            'type' => $this->faker->randomElement(['ocp', 'ecosysteme']),

        ];
    }
}