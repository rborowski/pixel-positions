<?php

namespace App\Http\Controllers;

use App\Filters\JobFilter;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Salary;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allowedParams = ['q', 'tag', 'employer', 'currency', 'min', 'max', 'page'];
        $filteredParams = array_filter(
            $request->only($allowedParams),
            fn($value) => $value !== null && $value !== ''
        );
        
        if (!empty($request->except($allowedParams))) {
            return redirect()->route('jobs.index', $filteredParams);
        }
        
        $jobs = JobFilter::make($request)->latest()->paginate(15);
        $jobs->appends(Arr::except($filteredParams, 'page'));

        return view('results', [
            'jobs' => $jobs,
            'tags' => Tag::orderBy('name', 'asc')->get(),
            'employers' => Employer::orderBy('name', 'asc')->get(),
            'currencies' => Salary::currencies(),
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'max:255'],
            'salary_amount' => ['required', 'numeric', 'min:0'],
            'salary_currency' => ['required', Rule::in(Salary::currencies())],
            'location' => ['required', 'max:255'],
            'description' => ['required', 'string', 'max:10000'],
            'schedule' => ['required', Rule::in(Job::schedules())],
            'link' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $salary = Salary::firstOrCreate([
            'value' => $attributes['salary_amount'],
            'currency' => $attributes['salary_currency'],
        ]);

        $job = Auth::user()->employer->jobs()->create([
            ...Arr::except($attributes, ['tags', 'salary_amount', 'salary_currency']),
            'salary_id' => $salary->id,
        ]);

        if ($attributes['tags'] ?? false) {
            foreach(explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}
