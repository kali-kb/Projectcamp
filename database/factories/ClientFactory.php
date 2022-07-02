<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "email" => $this->faker->email,
            "name" => $this->faker->name,
            "password" => Hash::make("abcdef"),
            "location" => $this->faker->country,
            "total_spent" => $this->faker->numerify()
        ];
    }
}
