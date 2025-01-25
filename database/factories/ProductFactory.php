<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->words(2,true) ?? 'Product',
            'category_id' => random_int(1,9),
            'short_description' => $this->faker->sentence,
            'price' => random_int(25, 200),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName,
            'quantity' => $this->faker->numberBetween(1, 75),
            'description' => $this->faker->paragraph,
            'keywords' => implode(', ', $this->faker->words(5)),
            'title' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['0', '1']),
            'content' => $this->faker->text(500),
        ];
    }
}
