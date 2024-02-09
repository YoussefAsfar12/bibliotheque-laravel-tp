<?php

namespace Database\Factories;

use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    protected $model = Emprunt::class;
    public function definition(): array
    {
        return [
            'livre_id' => Livre::factory()->create()->id, // Crée un nouveau livre et utilise son ID pour l'emprunt
            'date_emprunt' => $this->faker->dateTimeBetween('-1 month', '+1 month'), // Date d'emprunt aléatoire dans le mois dernier et le mois prochain
            'date_retour' => $this->faker->dateTimeBetween('+1 month', '+2 month'), // Date de retour aléatoire dans le prochain mois et le mois suivant
        ];
    }
}
