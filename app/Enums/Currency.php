<?php

namespace App\Enums;

enum Currency: string
{
    case PLN = 'PLN';
    case EUR = 'EUR';
    case USD = 'USD';
    case CHF = 'CHF';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
