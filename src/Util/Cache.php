<?php

namespace App\Util;

class Cache
{
    public static function fetch($url)
    {
        // cache files are created like cache/abcdef123456...
        $cacheFile = 'cache' . DIRECTORY_SEPARATOR . md5($url);

        if (file_exists($cacheFile)) {
            $fh = fopen($cacheFile, 'r');
            $cacheTime = trim(fgets($fh));

            // if data was cached recently, return cached data
            if ($cacheTime > strtotime('-60 minutes')) {
                return fread($fh, filesize($cacheFile));
            }

            // else delete cache file
            fclose($fh);
            unlink($cacheFile);
        }
    }

    public static function store($url, $json)
    {
        $cacheFile = 'cache' . DIRECTORY_SEPARATOR . md5($url);
        $fh = fopen($cacheFile, 'w');
        //fwrite($fh, time() . "\n");
        fwrite($fh, json_encode($json));
        fclose($fh);
    }
}