<?php

namespace Database\Factories;

use App\Enums\ModuleFormat;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => implode(' ', fake()->words(rand(1, 4))),
            'manufacturer_id' => Manufacturer::factory(),
            'decription' => fake()->optional()->sentences(
                nb: rand(1, 3),
                asText: true
            ),
            'hp_width' => fake()->numberBetween(2, 40),
            'depth_mm' => fake()->numberBetween(20, 350),
            'power_12v' => fake()->numberBetween(0, 1000),
            'power_minus12v' => fake()->numberBetween(0, 1000),
            'power_5v' => fake()->numberBetween(0, 1000),
            'is_discontinued' => fake()->boolean(15),
            'price' => fake()->randomFloat(
                nbMaxDecimals: 2,
                min: 0.01,
                max: 9999.99
            ),
            'image_path' => fake()->imageUrl(
                width: 300,
                height: 200,
                category: 'technics',
                randomize: true
            ),
            'is_diy' => fake()->boolean(20),
            'format' => fake()->randomElement(array_column(ModuleFormat::cases(), 'value')),
        ];
    }
}
