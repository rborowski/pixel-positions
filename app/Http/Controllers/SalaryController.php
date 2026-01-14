<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index()
    {
        $currencies = Salary::currencies();
        $salaryGroups = [];

        foreach ($currencies as $currency) {
            // Pobierz wszystkie salary dla danej waluty z liczbą jobów
            $salaries = Salary::where('currency', $currency)
                ->withCount('jobs')
                ->whereHas('jobs') // Tylko te które mają joby
                ->orderBy('value')
                ->get();

            // Jeśli nie ma salary dla tej waluty, pomiń
            if ($salaries->isEmpty()) {
                continue;
            }

            // Oblicz min i max wartość
            $minValue = $salaries->min('value');
            $maxValue = $salaries->max('value');

            // Podziel na 3 równe zakresy
            $rangeSize = ($maxValue - $minValue) / 3;

            $groups = [];
            for ($i = 0; $i < 3; $i++) {
                $rangeMin = $minValue + ($rangeSize * $i);
                $rangeMax = ($i === 2) ? $maxValue : $minValue + ($rangeSize * ($i + 1));

                // Zaokrąglij do pełnych liczb
                $rangeMin = floor($rangeMin);
                $rangeMax = ceil($rangeMax);

                // Policz ile jobów jest w tym zakresie
                $jobsCount = Job::whereHas('salary', function ($query) use ($currency, $rangeMin, $rangeMax) {
                    $query->where('currency', $currency)
                        ->whereBetween('value', [$rangeMin, $rangeMax]);
                })->count();

                // Dodaj grupę tylko jeśli ma joby
                if ($jobsCount > 0) {
                    $groups[] = [
                        'min' => $rangeMin,
                        'max' => $rangeMax,
                        'jobs_count' => $jobsCount,
                        'currency' => $currency,
                    ];
                }
            }

            if (!empty($groups)) {
                $salaryGroups[$currency] = $groups;
            }
        }

        return view('salaries.index', [
            'salaryGroups' => $salaryGroups,
        ]);
    }

}
