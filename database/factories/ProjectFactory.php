<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'customer_id' => $this->faker->randomNumber(1, 50),
            'product_id' => $this->faker->randomNumber(1, 50),
            'supervisor_id' => $this->faker->randomNumber(1, 50),
            'grope_id' => $this->faker->randomNumber(1, 50),
            'user_id' => $this->faker->randomNumber(1, 50),
            'description' => $this->faker->text(),
            'image' => $this->faker->image(null, 500, 500),
            'price' => $this->faker->randomNumber(),
            'total_price' => $this->faker->randomNumber(),
            'began_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),

        ];
    }
}
