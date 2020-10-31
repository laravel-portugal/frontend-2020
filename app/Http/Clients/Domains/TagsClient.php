<?php

namespace App\Http\Clients\Domains;

use App\Http\Clients\FakeClient;

trait TagsClient
{
    public function getTags()
    {
        // TODO: Implement real getTags() method.
        return (new FakeClient())->getTags();
    }
}
