<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class ChecksEmailHasGravatar
{
    public function __invoke($email)
    {
        $hash           = md5(strtolower(trim($email)));
        $gravatarCheckUrl = "http://www.gravatar.com/avatar/{$hash}?d=404";
        $response       = Http::get($gravatarCheckUrl);
        if ($response->ok()) {
            return $gravatarCheckUrl;
        }
        return null;
    }
}
