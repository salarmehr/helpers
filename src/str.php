<?php

namespace f;

class str
{

    public static function zwjRemover($string)
    {
        //    $noMedialForm = 'ادذرزژوآأإءة';
        $string = trim($string);
        $string = preg_replace('#(?<=[ادذرزژوآأإء])\x{200c}#u', '', $string);
        $string = preg_replace(['@ي@u', '@ك@u', '#,#u', '#;#u', '#%#u', '#ـ+#u',], ['ی', 'ک', '،', '؛', '٪', ''], $string);
        $string = preg_replace('#\s\x{200c}+|\x{200c}+\s+#u', ' ', $string);
        $string = preg_replace('#\s{2,}#u', ' ', $string);
        $string = preg_replace('#^\x{200c}|\x{200c}$#u', '', $string);

        return $string;
    }

    public static function normalize($string)
    {
        $string = preg_replace(['#\s*([\[\{\(«“])\s*#u', '#\s*([\]\}\)»”])\s*#u'], [' \1', '\1 '], $string);
        return $string;
    }

    public static function normalizeWord($word)
    {
        $word = preg_replace(['#\s*([\[\{\(«“])\s*#u', '#\s*([\]\}\)»”])\s*#u'], [' \1', '\1 '], $word);
        return $word;
    }

    public static function fullTrim($string)
    {
        //  preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u','',$str);
        return self::tailTrim(self::headTrim($string));
    }

    public static function tailTrim($string)
    {
        return preg_replace('#[^\pN\pL()]+$#u', '', $string);
    }

    public static function headTrim($string)
    {
        return preg_replace('#^[^\pN\pL()]+#u', '', $string);
    }

    public static function ellipsis($text, $max = 500, $append = '…')
    {
        $text = strip_tags($text);
        if (strlen($text) <= $max) {
            return $text;
        }

        return mb_substr($text, 0, $max) . $append;
    }

    /**
     * @param int $length
     * @param     boolean $number
     * @param     boolean $mixCase
     * @return string
     */
    public static function random($length = 10, $number = true, $mixCase = true)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        if ($mixCase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($number) {
            $characters .= '0123456789';
        }
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public static function isEmail($value, $falseValue = false)
    {
        return preg_match('#^\S+@\S+\.\S+$#', $value) ? $value : $falseValue;
    }
}