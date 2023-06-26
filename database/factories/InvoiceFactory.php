<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            'customer_id' => $this->faker->randomNumber(1, 50),
            'title' => $this->faker->title(),
            'date' => $this->faker->date(),
            'remaining_amount' => $this->faker->randomNumber(),
            'value' => $this->faker->randomNumber(),
            'discount' => $this->faker->randomNumber(),
            'tax' => $this->faker->randomNumber(),
            'total' => $this->faker->randomNumber(),
            'project_id' => $this->faker->randomNumber(1, 50),
            'amount' => $this->faker->randomNumber(),
            'massage' => $this->faker->text(),
        ];
    }
}
