<?php

namespace f\str;

use f\str;

abstract class fa extends str
{
    public static function normalize($string)
    {
        $string = self::normalizeWord($string);
        $string = preg_replace('#(["\'`]+)(.+?)(\1)#u', '«\2»', $string);
        $string = preg_replace('#[ ‌  ]*([:;,؛،.؟!]{1})[ ‌  ]*#u', '\1 ', $string);
        $string = preg_replace('#([۰-۹]+):\s+([۰-۹]+)#u', '\1:\2', $string);
        return parent::normalize($string);
    }

    public static function normalizeWord($word)
    {
        $word = self::zwjRemover($word);
        //    $word = preg_replace(['@ي@u', '@ك@u', '#,#u', '#;#u', '#%#u', '#ـ+#u',], ['ی', 'ک', '،', '؛', '٪', ''],
        $word = preg_replace(['@ي@u', '@ك@u', '#,#u', '#;#u', '#%#u', '#ـ+#u',], ['ی', 'ک', ''],
            $word);
        return parent::normalizeWord($word);
    }
}