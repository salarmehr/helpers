<?php

namespace f\intl;

use f\num;

class fa
{
    /**
     * National ID validator
     * @param      $nid
     * @param bool $falseValue
     * @return bool|string
     */
    public static function isNid($nid, $falseValue = false)
    {
        $nid = str_pad(preg_replace('#\D#', '', num::toWestern($nid)), 10, '0', STR_PAD_LEFT);
        if (!preg_match('/^[0-9]{10}$/', $nid)) {
            return $falseValue;
        }


        for ($i = 0; $i < 10; $i++) {
            if (preg_match('/^' . $i . '{10}$/', $nid)) {
                return $falseValue;
            }
        }

        for ($i = 0, $sum = 0; $i < 9; $i++) {
            $sum += ((10 - $i) * intval(substr($nid, $i, 1)));
        }

        $ret = $sum % 11;
        $parity = intval(substr($nid, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity)) {
            return $nid;
        }

        return $falseValue;
    }

    public static function isMobile($value, $falseValue = false)
    {
        $value = '0' . substr(preg_replace('#\D#', '', num::toWestern($value)), -10);

        return preg_match('#^09\d{9}$#', $value) ? $value : $falseValue;
    }

    public static function isPhone($value, $falseValue = false)
    {
        $value = '0' . substr(preg_replace('#\D#', '', num::toWestern($value)), -10);

        return preg_match('#^0\d{10}$#', $value) ? $value : $falseValue;
    }

    public static function isZip($value, $falseValue = false)
    {
        $value = preg_replace('#\D#', '', num::toWestern($value));

        return preg_match('#^[13456789]{10}$#', $value) ? $value : $falseValue;
    }
}