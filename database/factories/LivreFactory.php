<?php

namespace Database\Factories;

use App\Models\Livre;
use App\Models\Auteur;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get random auteur ID
        $auteurId = Auteur::all()->random()->id;

        return [
            'titre' => $this->faker->sentence,
            'annee_publication' => $this->faker->year,
            'nombre_pages' => $this->faker->numberBetween(50, 500),
            'auteur_id' => $auteurId,
        ];
    }
}
