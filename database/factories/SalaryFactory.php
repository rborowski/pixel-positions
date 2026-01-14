<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $baseValue = fake()->numberBetween(30000, 200000);
        $roundedValue = round($baseValue / 100) * 100;
        
        return [
            'value' => $roundedValue,
            'currency' => fake()->randomElement(Salary::currencies()),
        ];
    }
}
