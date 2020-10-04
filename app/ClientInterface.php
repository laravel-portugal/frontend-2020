<?php

namespace App;

interface ClientInterface
{
    public function getRecentLinks();
    public function getTags();
    public function submitLink($attributes);
}
