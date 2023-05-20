<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferPrice>
 */
class OfferPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->randomNumber(1, 50),
            'company_id' => $this->faker->randomNumber(1, 50),
            'product_id' => $this->faker->randomNumber(1, 50),
            'title' => $this->faker->title(),
            'message' => $this->faker->text(),
            'address' => $this->faker->address(),
            'tax' => $this->faker->randomNumber(),
            'price' => $this->faker->randomNumber(),
            'discount' => $this->faker->randomNumber(),

        ];
    }
}
