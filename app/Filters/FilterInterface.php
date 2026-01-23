<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface FilterInterface
{
    /**
     * Applies filter on query builder
     */
    public function apply(Builder $query, Request $request): Builder;

    /**
     * Checks whether a filter should be applied
     */
    public function shouldApply(Request $request): bool;
}
