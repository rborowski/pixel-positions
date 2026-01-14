<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Main page
     */
    public function index()
    {
        $jobs = Job::with(['employer', 'tags', 'salary'])->latest()->get()->groupBy('featured');

        return view('index', [
            'featuredJobs' => $jobs[0] ?? collect(),
            'jobs' => $jobs[1] ?? collect(),
            'tags' => Tag::all()
        ]);
    }
}
