<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salarie>
 */
class SalarieFactory extends Factory
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
            'section_id' => $this->faker->randomNumber(1, 50),
            'Job_number' => $this->faker->randomNumber(),
            'national_number' => $this->faker->randomNumber(),
            'deductions' => $this->faker->randomNumber(),
            'discounts' => $this->faker->randomNumber(1, 50),
            'tax' => $this->faker->randomNumber(),
            'social_security' => $this->faker->randomNumber(),
            'net_salary' => $this->faker->randomNumber(),
            'date' => $this->faker->date(),
            'employee_name' => $this->faker->name(),
        ];
    }
}
