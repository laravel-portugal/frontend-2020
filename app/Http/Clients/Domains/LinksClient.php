<?php

namespace App\Http\Clients\Domains;

use App\Http\Clients\FakeClient;

trait LinksClient
{
    public function getRecentLinks()
    {
        // TODO
        return (new FakeClient())->getRecentLinks();
    }

    public function submitLink($data)
    {
        return $this->http()
            ->post('links', $data);
    }
}
