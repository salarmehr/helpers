<?php

namespace f;

abstract class dir
{
    public static function mergeTextFiles($root, $outputPath = null, $debug = false)
    {
        $merged = '';

        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
        );

        foreach ($iter as $path => $dir) {
            $fileName = pathinfo($dir)['basename'];
            if ($debug) {
                $merged .= PHP_EOL . "// $fileName *****************************" . PHP_EOL;
            }
            $merged .= @file_get_contents($dir) . PHP_EOL;
        }
        if ($outputPath) {
            return file_put_contents($outputPath, $merged);
        }

        return $merged;
    }

    public static function fileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1) {
            return $bytes . ' B';
        }

        return '0';
    }

}