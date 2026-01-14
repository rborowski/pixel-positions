<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TagFilter implements FilterInterface
{
    public function apply(Builder $query, Request $request): Builder
    {
        $tagName = $request->tag;
        
        if (empty($tagName)) {
            return $query;
        }
        
        return $query->whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', $tagName);
        });
    }

    public function shouldApply(Request $request): bool
    {
        return $request->has('tag') && !empty($request->tag);
    }
}
