<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'titre' => fake()->word(), 
            'description' => fake()->sentence(),
            'prix' => fake()->randomFloat(2, 10, 1000), 
            'image' => fake()->imageUrl(), 
            'categorie_id' => Category::factory(),
        ];
    }
}
