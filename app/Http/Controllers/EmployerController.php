<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }

    public function show(Employer $employer)
    {
        $jobs = $employer->jobs()
            ->with(['employer', 'tags'])
            ->get();

        return view('results', [
            'jobs' => $jobs,
            'title' => "All {$employer->name} jobs"
        ]);
    }
}
