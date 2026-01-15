<?php

namespace App\Enums;

enum Schedule: string
{
    case PART_TIME = 'Part Time';
    case FULL_TIME = 'Full Time';
    case FREELANCE = 'Freelance';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
