<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EmployerFilter implements FilterInterface
{
    public function apply(Builder $query, Request $request): Builder
    {
        $employerId = $request->employer;
        
        if (!is_numeric($employerId)) {
            return $query;
        }
        
        return $query->where('employer_id', (int) $employerId);
    }

    public function shouldApply(Request $request): bool
    {
        return $request->has('employer') && is_numeric($request->employer);
    }
}
