<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'details' => $this->faker->text(),
            'notes' => $this->faker->text(),
            'date' => $this->faker->date(),
            'begin_date' => $this->faker->date(),
            'customer_id' => $this->faker->randomNumber(1, 50),
            'company_id' => $this->faker->randomNumber(1, 50),
            'group_id' => $this->faker->randomNumber(1, 50),

        ];
    }
}
