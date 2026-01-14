<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Salary;
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
            'salary_id' => Salary::factory(),
            'title' => $this->faker->jobTitle(),
            'location' => $this->faker->randomElement(['Remote', 'Hybrid', 'On-site']),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Freelance']),
            'link' => $this->faker->url(),
            'featured' => false
        ];
    }
}
