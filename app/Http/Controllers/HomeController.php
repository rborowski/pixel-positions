<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Main page
     */
    public function __invoke()
    {
        return view('index', [
            'featuredJobs' => Job::with(['employer', 'tags', 'salary'])
                ->where('featured', true)
                ->inRandomOrder()
                ->limit(9)
                ->get(),
            'jobs' => Job::with(['employer', 'tags', 'salary'])
                ->where('featured', false)
                ->latest()
                ->limit(10)
                ->get(),
            'tags' => Tag::all()
        ]);
    }
}
