<?php

namespace Database\Factories;
use App\Models\CandidatEcosysteme;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CandidatEcosysteme>
 */
class CandidatEcosystemeFactory extends Factory
{
    protected $model = CandidatEcosysteme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CIN' => $this->faker->unique()->numerify('############'),
            'Entreprise_actuelle' => $this->faker->company,
            'Poste_actuellement_occupe' => $this->faker->jobTitle,
            'Type_contrat' => $this->faker->randomElement(['CDI', 'CDD', 'Stage', 'Freelance']),
            'Anciennete' => $this->faker->randomNumber(2),
            'annees_experience' => $this->faker->randomNumber(2),
            'Niveau_scolaire' => $this->faker->randomElement(['Primaire', 'Collège', 'Lycée', 'Université']),
            'Diplôme' => $this->faker->randomElement(['Bac', 'Licence', 'Master', 'Doctorat']),
            'Spécialité' => $this->faker->randomElement(['Informatique', 'Finance', 'Marketing', 'Ressources humaines']),
            'Organismes_de_diplôme' => $this->faker->company,
            'Organisme_de_formation' => $this->faker->company,
            'Langues' => $this->faker->randomElement(['Français', 'Arabe', 'Anglais']),
            'first_time' => $this->faker->boolean,
        ];
    }
}
