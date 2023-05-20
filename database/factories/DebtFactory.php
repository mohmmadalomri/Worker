<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debt>
 */
class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_name' => $this->faker->name(),
            'employee_id' => $this->faker->randomNumber(1, 50),
            'Job_number' => $this->faker->randomNumber(),
            'national_number' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'specialization' => $this->faker->name(),
            'image' => $this->faker->image(null, 500, 500),
            'date' => $this->faker->date(),
            'value' => $this->faker->randomNumber(),
        ];
    }
}
