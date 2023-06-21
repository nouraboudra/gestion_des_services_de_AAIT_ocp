<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricule' =>  $this->faker->unique()->numerify('#########'),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make("password"), // password
            'remember_token' => Str::random(10),
            'date_naissance' =>$this->faker->dateTimeThisMonth(),
            'date_embauche' =>$this->faker->dateTimeThisMonth(),
            'prenom'  => $this->faker->name,
            'nom' =>$this->faker->name,
        ];
    }
}
