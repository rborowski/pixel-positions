<?php

namespace App\Filters;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class JobFilter
{
    /**
     * List of available filters
     */
    private array $filters = [
        SalaryFilter::class,
        TagFilter::class,
        EmployerFilter::class,
        SearchFilter::class,
    ];

    /**
     * Create a new filter instance and apply filters
     */
    public static function make(Request $request): Builder
    {
        $query = Job::query()->with(['employer', 'tags', 'salary']);
        $filter = new self();
        return $filter->apply($query, $request);
    }

    /**
     * Apply all available filters
     */
    public function apply(Builder $query, Request $request): Builder
    {
        foreach ($this->filters as $filterClass) {
            $filter = new $filterClass();
            
            if ($filter->shouldApply($request)) {
                $query = $filter->apply($query, $request);
            }
        }

        return $query;
    }
}
