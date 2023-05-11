<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Ford', 'Honda', 'Toyota']),
            'bensin' => fake()->randomElement(['Pertalite', 'Dex-Lite', 'Dex', 'Pertamax'])
        ];
    }
}
