<?php

namespace App\Http\Crawlers;

use Illuminate\Support\Str;

class OpenGraphMetaCrawler
{
    protected ?string $content = null;
    protected ?\DOMDocument $doc = null;
    protected ?\DOMXPath $xPath = null;

    public function crawl(string $link): self
    {
        $this->content = file_get_contents($link);

        $this->doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $this->doc->loadHTML($this->content);
        libxml_clear_errors();

        $this->xPath = new \DOMXPath($this->doc);

        return $this;
    }

    public function getOGImage(): ?string
    {
        $imgUrl = optional($this->xPath->query('//head/meta[@property="og:image"]/@content')[0])
            ->value;

        if (!$imgUrl) {
            return null;
        }

        return Str::startsWith($imgUrl, '/')
            ? 'http://' . trim($imgUrl, '/')
            : $imgUrl;
    }
}
