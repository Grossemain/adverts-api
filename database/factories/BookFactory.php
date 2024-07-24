<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Advert;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'description' => fake()->paragraph(),
            'edition' => fake()->name(),
            'purchase_price' => fake()->randomFloat(2, 5, 100),
            'is_for_sale' => fake()->boolean,
            'user_id' => rand(1, 30),
            'advert_id' =>rand(1, 30),
        ];
    }
}
