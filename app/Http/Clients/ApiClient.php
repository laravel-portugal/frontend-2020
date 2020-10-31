<?php

namespace App\Http\Clients;

abstract class ApiClient
{
    protected static $fake = false;

    public static function fake()
    {
        self::$fake = true;
    }

    public static function isFake()
    {
        return self::$fake;
    }

    public abstract function getRecentLinks();

    public abstract function getTags();

    public abstract function submitLink($data);
}
