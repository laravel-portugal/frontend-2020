<?php

namespace App\Http\Clients;

abstract class ApiClient
{
    protected static $fake = false;
    protected $response = null;

    public static function fake()
    {
        self::$fake = true;
    }

    public static function isFake()
    {
        return self::$fake;
    }

    public function getLastResponse()
    {
        return $this->response;
    }

    abstract public function json();

    abstract public function status();

    abstract public function getRecentLinks();

    abstract public function getTags();

    abstract public function submitLink($data, $coverImage);
}
