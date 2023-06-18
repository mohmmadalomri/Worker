<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacation>
 */
class VacationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
          'employee_name'=>$this->faker->name(),
          'employee_id'=>$this->faker->randomNumber(1,50),
          'national_number'=>$this->faker->randomNumber(),
          'Job_number'=>$this->faker->randomNumber(),
          'specialization'=>$this->faker->title(),
          'description'=>$this->faker->text(),
          'reason'=>$this->faker->title(),
          'image'=>$this->faker->image(null,500,500),
          'start_day'=>$this->faker->date(),
          'end_day'=>$this->faker->date(),
          'type'=>$this->faker->randomElement(['paid','deducted','sick','without_salary_deduction']),

        ];
    }
}
