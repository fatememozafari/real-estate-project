<?php


namespace App\Helpers\Format;


class UnifyLetterCharacters
{
    public static function arabicYLetter ($string)
    {
        return str_replace('ي', 'ی', $string);
    }
    public static function arabicKLetter ($string)
    {
        return str_replace('ك', 'ک', $string);
    }
    public static function persianYLetter ($string)
    {
        return str_replace('ي', 'ی', $string);
    }
    public static function persianKLetter ($string)
    {
        return str_replace('ک', 'ك', $string);
    }


}
