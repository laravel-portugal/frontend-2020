<?php

namespace App\Http\Clients\Domains;

use App\Http\Clients\FakeClient;

trait LinksClient
{
    public function getRecentLinks()
    {
        // TODO
        return $this->response = (new FakeClient())->getRecentLinks();
    }

    public function submitLink($data, $coverImage)
    {
        return $this->response = $this->http()
            ->attach('cover_image', file_get_contents($coverImage), 'cover_image.jpg')
            ->post('links', $this->dataToMultipart($data));
    }
}
