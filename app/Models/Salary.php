<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salary extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryFactory> */
    use HasFactory;

    public const CURRENCY_PLN = 'PLN';
    public const CURRENCY_EUR = 'EUR';
    public const CURRENCY_USD = 'USD';
    public const CURRENCY_CHF = 'CHF';

    protected $fillable = [
        "value",
        "currency"
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public static function currencies(): array
    {
        return [
            self::CURRENCY_PLN,
            self::CURRENCY_EUR,
            self::CURRENCY_USD,
            self::CURRENCY_CHF,
        ];
    }

    public function formatted(): string
    {
        return number_format($this->value, 0, '.', ',') . ' ' . $this->currency;
    }
}
