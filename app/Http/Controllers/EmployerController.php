<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class EmployerController extends Controller
{
    public function __invoke()
    {
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }
}
