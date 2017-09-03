<?php

namespace f;

abstract class arr
{
  /***
   * @param array $array
   * @return array
   * @notes flatten associative multi dimension array recursive
   * @link  http://cowburn.info/2012/03/17/flattening-a-multidimensional-array-in-php/
   */
  public static function flatten(array $array)
  {
    $output = [];
    array_walk_recursive($array, function ($current) use (&$output) {
      $output[] = $current;
    });

    return $output;
  }

  /***
   * @param array $array
   * @return array
   * @author R. Salarmehr
   * @author jackflash
   * @link   http://stackoverflow.com/questions/13525893/array-permutation-in-php
   */
  public static function permutation(array $array)
  {
    $array = array_map(function ($v) {
      return (array)$v;
    }, $array);
    $count = array_map('count', $array);
    $finalSize = array_product($count);
    $arraySize = count($array);
    $output = array_fill(0, $finalSize, []);
    for ($i = 0; $i < $finalSize; $i++) {
      for ($c = 0; $c < $arraySize; $c++) {
        $output[$i][] = $array[$c][$i % $count[$c]];
      }
    }

    return $output;
  }

  /***
   * @param array $array1
   * @param array $array2
   * @return array
   * @link http://stackoverflow.com/questions/683702/how-do-you-perform-a-preg-match-where-the-pattern-is-an-array-in-php
   */
  public static function union(array $array1, array $array2)
  {
    return array_unique(array_merge($array1, $array2));
  }

  public static function subset($array, $keys)
  {
    return array_intersect_key($array, array_flip($keys));
  }

  public static function paginate($array, $pageSize, $page = 1)
  {
    $page = $page < 1 ? 1 : $page;
    $start = ($page - 1) * $pageSize;

    return array_slice($array, $start, $pageSize);
  }

  public static function htmlArray($array, $key = '')
  {
    static $arr = [];

    foreach ((array)$array as $k => $v) {
      $key_name = $key == '' ? $k : $key . '[' . $k . ']';
      if (is_array($v) && self::isAssoc($v)) {
        self::htmlArray($v, $key_name);
      }
      else {
        $arr[$key_name] = $v;
      }
    }

    return $arr;
  }

  public static function dotArray($array, $key = '')
  {
    static $arr = [];

    foreach ((array)$array as $k => $v) {
      $key_name = $key == '' ? $k : $key . '.' . $k;
      if (is_array($v) && self::isAssoc($v)) {
        self::dotArray($v, $key_name);
      }
      else {
        $arr[$key_name] = $v;
      }
    }

    return $arr;
  }

  public static function isAssoc(array $arr)
  {
    return array_keys($arr) !== range(0, count($arr) - 1);
  }

  /**
   * if receive an associative array puts it in another array otherwise returns.
   * @param $items
   * @return array
   */
  public static function toIndexArray($items)
  {
    if ($items && self::isAssoc($items)) {
      return [$items];
    }

    return $items;
  }

  /**
   * checks a value in an array with this format
   * [
   * 'publish'=>[1,3,5]
   * 'full'=>[4,9]
   * ]
   * in this example if $needle==4 the function returns 'full'
   * @param array            $haystack
   * @param string|array|int $needle
   * @return bool|int|string
   */
  public static function findKey(array $haystack, $needle)
  {
    foreach ($haystack as $k => $v) {
      if ((boolean)count(array_intersect((array)$needle, (array)$v))) {
        return $k;
      }
    }

    return false;
  }
}