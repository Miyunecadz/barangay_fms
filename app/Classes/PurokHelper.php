<?php

namespace App\Classes;

class PurokHelper
{
    private static $puroks = [
        'purok1' => 'Purok 1',
        'purok2' => 'Purok 2',
        'purok3' => 'Purok 3',
        'purok4' => 'Purok 4',
        'purok5' => 'Purok 5',
        'purok6' => 'Purok 6',
        'purok7' => 'Purok 7',
        'purok8' => 'Purok 8',
        'purok9' => 'Purok 9'
    ];

    public static function getPurok()
    {
        return self::$puroks;
    }

    public static function toSingleString($purok)
    {
        return array_search($purok, self::$puroks);
    }

    public static function toHumanReadablePurok($purok)
    {
        return self::$puroks[$purok];
    }
}
