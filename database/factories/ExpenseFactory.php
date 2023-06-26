<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomNumber(1, 50),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'purpose' => $this->faker->text(),
            'end_day' => $this->faker->date(),
            'start_day' => $this->faker->date(),
            'value' => $this->faker->randomNumber(),

        ];
    }
}
