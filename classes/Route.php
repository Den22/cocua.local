<?php

namespace Application\Classes;


class Route
{
    public static function run()
    {
        $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $parts = explode('/', trim($request, ' /'));
        $ctrl = !empty($parts['0']) ? ucfirst($parts['0']) : 'Home';
        $act = !empty($parts['1']) ? ucfirst($parts['1']) : 'Show';
        $var1 = !empty($parts['2']) ? ($parts['2']) : null;
        $var2 = !empty($parts['3']) ? ($parts['3']) : null;
        $ClassName = 'Application\\Controllers\\' . $ctrl;
        $method = 'action' . $act;
        $controller = new $ClassName;
        $controller->$method($var1, $var2);
    }
}