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
    public function definition()
    {
        return [
            'company_id' => $this->faker->randomNumber(1, 50),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->image(null, 500, 500),
            'price' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
            'type' => $this->faker->randomElement(['product', 'serves'])

        ];
    }
}
