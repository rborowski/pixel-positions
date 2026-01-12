<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['50,000 USD', '60,000 USD', '100,000 USD', '150,000 USD', '90,000 USD']),
            'location' => $this->faker->randomElement(['Remote', 'Hybrid', 'On-site']),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Freelance']),
            'link' => $this->faker->url(),
            'featured' => false

        ];
    }
}
