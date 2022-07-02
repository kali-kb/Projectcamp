<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobModel>
 */
class JobModelFactory extends Factory
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
            "id" => 5,
            "price" => $this->faker->numerify()
        ];
    }
}
