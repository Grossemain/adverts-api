<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdvertVinylFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'advert_name' => fake()->name(),
            'img' => fake()->name(),
            'advert_description' => fake()->paragraph(),
            'selling_price' => fake()->randomFloat(2, 5, 100),
        ];
    }
}
