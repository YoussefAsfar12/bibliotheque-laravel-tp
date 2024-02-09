<?php

namespace Database\Factories;

use App\Models\Auteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auteur>
 */

class AuteurFactory extends Factory
{
    
    protected $model = Auteur::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
        ];
    }
}
