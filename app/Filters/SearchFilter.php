<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchFilter implements FilterInterface
{
    public function apply(Builder $query, Request $request): Builder
    {
        $searchTerm = $request->q;
        
        if (empty($searchTerm)) {
            return $query;
        }
        
        return $query->where('title', 'LIKE', '%' . $searchTerm . '%');
    }

    public function shouldApply(Request $request): bool
    {
        return $request->has('q') && !empty($request->q);
    }
}
