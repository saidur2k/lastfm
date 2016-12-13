<?php

namespace App;

class Router {

    private static $routes = array();

    private function __construct() {}

    public static function route($pattern, $callback) {
        //$pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url)
    {
        $url = trim($url, '/');
        $urlSegments = explode('/', $url);
        foreach (self::$routes as $pattern => $callback)
        {
            $patternSegments = explode('/', $pattern);

            if ($patternSegments[0] === $urlSegments[0] && $patternSegments[1] === $urlSegments[1])
            {
                $scheme = ['segment', 'method', 'selection', 'page'];
                $route = [];
                foreach ($urlSegments as $index => $segment){
                    if ($scheme[$index] == 'params') {
                        $route['params'] = array_slice($urlSegments, $index);
                        break;
                    }
                    else {
                        $route[$scheme[$index]] = $segment;
                    }
                }

                if ($route['segment'] && $route['method'] && $route['selection'])
                {
                    return call_user_func_array($callback, $route);
                }
            }
        }

        throw new \Exception("Error: route not found");
    }
}