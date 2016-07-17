<?php

namespace Application\Classes;


class Cookie
{
    const SECONDS_IN_YEAR = 31536000;

    public static function set($key, $value, $time = self::SECONDS_IN_YEAR)
    {
        setcookie($key, $value, time() + $time, '/');
    }

    public static function get($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function delete($key)
    {
        if (isset($_COOKIE[$key])) {
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}