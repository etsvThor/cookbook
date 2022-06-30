<?php

namespace App\Enums;

enum UnitTypes: string
{
    case VOLUME = 'Volume';
    case WEIGHT = 'Weight';
    case LENGTH = 'Length';

    public static function getArray(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->value] = $case->value;
        }

        return $cases;
    }
}