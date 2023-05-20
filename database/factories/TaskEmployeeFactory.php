<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskEmployee>
 */
class TaskEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(1, 50),
            'task_number' => $this->faker->randomNumber(),
            'national_number' => $this->faker->randomNumber(),
            'Job_number' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'name' => $this->faker->title(),
            'massage' => $this->faker->title(),
            'image' => $this->faker->image(null, 500, 500),
            'employee_name' => $this->faker->name(),

        ];
    }
}
