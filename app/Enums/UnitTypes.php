<?php

namespace App\Enums;

enum UnitTypes: string
{
    case VOLUME = 'Volume';
    case MASS = 'Mass';
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