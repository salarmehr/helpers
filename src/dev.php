<?php

namespace f;

abstract class dev
{
    /**
     * Return the value from an associative array or an object.
     * Taken from Garden core (for use this functions in other projects).
     * @note Garden.Core function.
     * @param string $key The key or property name of the value.
     * @param mixed $collection The array or object to search.
     * @param mixed $default The value to return if the key does not exist.
     * @param bool $remove Whether or not to remove the item from the collection.
     * @return mixed $result The value from the array or object.
     */

    public static function getValue($key, &$collection, $default = false, $remove = false)
    {
        $result = $default;
        if (is_array($collection) && array_key_exists($key, $collection)) {
            $result = $collection[$key];
            if ($remove) {
                unset($collection[$key]);
            }
        }
        elseif (is_object($collection) && property_exists($collection, $key)) {
            $result = $collection->$key;
            if ($remove) {
                unset($collection->$key);
            }
        }

        return $result;
    }

// A shorthand function
    public static function echoLn($string)
    {
        echo $string . PHP_EOL;
    }

    /***
     * The public static function is used in log function
     * @param $str
     * @param bool $now
     */
    public static function strLog($str, $now = false)
    {
        if ($now) {
            echo "<script type='text/javascript'>\n";
            echo "//<![CDATA[\n";
            echo "console.log(", json_encode($str), ");\n";
            echo "//]]>\n";
            echo "</script>";
        }
        else {
            register_shutdown_function('\Util\strLog', $str, true);
        }
    }

    /***
     * Send log from php to browsers console.
     * similar to js console.log() method:
     * @param $var
     * @param string $name
     * @param bool $now
     */
    public static function log($var, $name = '', $now = false)
    {
        $type = gettype($var);
        if (is_string($var)) {
            $type .= '(' . strlen($var) . ')';
        }
        if (is_array($var)) {
            $type = '(' . count($var) . ')';
        }


        if (strlen($name)) {
            self::strLog("$type $name: " . var_export($var, true), $now);
        }
        else {
            self::strLog("$type:" . var_export($var, true), $now);
        }
    }
}