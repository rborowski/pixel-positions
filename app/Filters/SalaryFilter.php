<?php

namespace App\Filters;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SalaryFilter implements FilterInterface
{
    public function apply(Builder $query, Request $request): Builder
    {
        $currency = $request->currency;
        
        if (!in_array($currency, Salary::currencies())) {
            return $query;
        }

        $min = $request->has('min') ? (float) $request->min : null;
        $max = $request->has('max') ? (float) $request->max : null;

        return $query->whereHas('salary', function ($q) use ($currency, $min, $max) {
            $q->where('currency', $currency);
            
            if ($min !== null && $min >= 0) {
                $q->where('value', '>=', $min);
            }
            
            if ($max !== null && $max >= 0 && ($min === null || $max >= $min)) {
                $q->where('value', '<=', $max);
            }
        });
    }

    public function shouldApply(Request $request): bool
    {
        return $request->has('currency');
    }
}
