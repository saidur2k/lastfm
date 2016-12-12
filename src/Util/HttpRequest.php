<?php

namespace App\Util;

class HttpRequest
{
    public static function get($url)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);

        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            throw new \Exception('Error: ' . var_export($info));
        }

        curl_close($curl);

        $decoded = json_decode($curl_response , true);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            throw new \Exception('Error: ' . $decoded->response->errormessage);
        }

        return $decoded;
    }
}