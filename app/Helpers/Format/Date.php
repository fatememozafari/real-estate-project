<?php

namespace App\Helpers\Format;

use Morilog\Jalali\CalendarUtils;

class Date
{
    public static function toCarbonDateFormat($date)
    {
        $date = Number::toEnglish($date);
        return CalendarUtils::createCarbonFromFormat('Y/m/d', $date)->format('Y-m-d');
    }
}
