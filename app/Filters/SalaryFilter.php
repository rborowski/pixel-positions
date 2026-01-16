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
            return $query->whereRaw('1 = 0');
        }

        $min = $this->parseNumericParam($request, 'min');
        $max = $this->parseNumericParam($request, 'max');
        
        if ($min === false || $max === false) {
            return $query->whereRaw('1 = 0');
        }
        
        if ($min !== null && $max !== null && $min > $max) {
            return $query->whereRaw('1 = 0');
        }

        return $query->whereHas('salary', function ($q) use ($currency, $min, $max) {
            $q->where('currency', $currency);
            
            if ($min !== null && $min >= 0) {
                $q->where('value', '>=', $min);
            }
            
            if ($max !== null && $max >= 0) {
                $q->where('value', '<=', $max);
            }
        });
    }

    private function parseNumericParam(Request $request, string $key): float|false|null
    {
        if (!$request->has($key) || $request->$key === null || $request->$key === '') {
            return null;
        }
        
        return is_numeric($request->$key) ? (float) $request->$key : false;
    }

    public function shouldApply(Request $request): bool
    {
        return $request->has('currency') 
            && $request->currency !== null 
            && $request->currency !== '';
    }
}
