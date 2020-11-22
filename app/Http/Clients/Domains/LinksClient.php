<?php

namespace App\Http\Clients\Domains;

trait LinksClient
{
    public function getRecentLinks()
    {
        $this->response = $this->http()->get('links');

        return $this->response->json();
    }

    public function submitLink($data, $coverImage)
    {
        return $this->response = $this->http()
            ->attach('cover_image', file_get_contents($coverImage), 'cover_image.jpg')
            ->post('links', $this->dataToMultipart($data));
    }
}
