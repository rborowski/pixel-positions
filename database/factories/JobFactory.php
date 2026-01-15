<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
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
            'description' => implode("\n", $this->faker->paragraphs(5)),
            'schedule' => $this->faker->randomElement(Job::schedules()),
            'link' => $this->faker->url(),
            'featured' => $this->faker->boolean(50)
        ];
    }
}
