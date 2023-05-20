<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'company_name' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'facebook_link' => $this->faker->url(),
            'tweeter_link' => $this->faker->url(),
            'youtube_link' => $this->faker->url(),
            'linkedin_link' => $this->faker->url(),
            'instgram_link' => $this->faker->url(),
            'address_1' => $this->faker->address(),
            'address_2' => $this->faker->address(),
            'town' => $this->faker->city(),
            'interrupt' => $this->faker->randomNumber(),
            'zipcode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
        ];
    }
}
