<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'website_url' => fake()->optional()->url(),
            'logo' => fake()->optional()->imageUrl(
                width: 200,
                height: 200,
                category: 'business',
                randomize: true
            ),
        ];
    }
}
