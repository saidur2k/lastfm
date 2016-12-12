<?php

namespace App\Util;

class Stringify
{
    public static function parameters($params)
    {
        if (is_array($params))
        {
            return array_reduce(array_keys($params), function($carry, $item) use($params) {
                if (strlen($item) > 0)
                {
                    $carry .= ('&' . $item . '=' . $params[$item]);
                }
                return $carry;
            });
        }
    }
}