<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "job_title" => $this->faker->jobTitle(),
            "job_description" => $this->faker->sentence(),
            "id" => 1,
            "price" => $this->faker->numerify()
        ];
    }
}
