<?php

namespace f;

class num
{
    /***
     * @param int $integer
     * @param boolean $uppercase
     * @return string
     */
    public static function toRomanic($integer, $uppercase = true)
    {
        if (!is_int($integer)) {
            return $integer;
        }
        $table = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];
        $return = '';
        while ($integer > 0) {
            foreach ($table as $rom => $arb) {
                if ($integer >= $arb) {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }

        return ($uppercase) ? $return : strtolower($return);
    }

    public static function toWestern($string)
    {
        $w = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $e = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        return str_replace($e, $w, $string);
    }

    public static function toEastern($string)
    {
        $w = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $e = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        return str_replace($w, $e, $string);
    }

    /***
     * @param string $roman
     * @return int
     */
    public static function toArabic($roman)
    {
        if (!is_string($roman)) {
            return $roman;
        }
        $roman = strtoupper($roman);
        $romans = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        $result = 0;

        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }

        return $result;
    }
}