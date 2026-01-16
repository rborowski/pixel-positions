<?php

namespace App\Models;

use App\Enums\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salary extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryFactory> */
    use HasFactory;

    protected $fillable = [
        "value",
        "currency"
    ];

    protected function casts(): array
    {
        return [
            'currency' => Currency::class,
        ];
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get all available currency values.
     * Convenience method for use in views and validation.
     */
    public static function currencies(): array
    {
        return Currency::values();
    }

    /**
     * Get salary range (min and max) for a given currency or all currencies.
     */
    public static function range(?string $currency = null): array
    {
        $query = static::query();
        if ($currency) {
            $query->where('currency', $currency);
        }
        
        $range = $query->selectRaw('MIN(value) as min, MAX(value) as max')->first();
        
        return [
            'min' => $range?->min ?? 0,
            'max' => $range?->max ?? 100000,
        ];
    }

    public function formatted(): string
    {
        return number_format($this->value, 0, '.', ',') . ' ' . $this->currency->value;
    }
}
