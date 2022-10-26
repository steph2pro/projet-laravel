<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EtudiantsFactory extends Factory
{
    protected $model=Etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' =>$this->faker->lastName,
            'prenom' =>$this->faker->firstName(),
            'classe_id' =>rand(1,7)
        ];
    }
}
