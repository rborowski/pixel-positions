<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface FilterInterface
{
    /**
     * Aplikuje filtr na query builderze
     */
    public function apply(Builder $query, Request $request): Builder;

    /**
     * Sprawdza czy filtr powinien być zastosowany
     */
    public function shouldApply(Request $request): bool;
}
