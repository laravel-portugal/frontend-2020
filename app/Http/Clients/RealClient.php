<?php

namespace App\Http\Clients;

use App\Http\Clients\Domains\LinksClient;
use App\Http\Clients\Domains\TagsClient;
use Illuminate\Support\Facades\Http;

class RealClient extends ApiClient
{
    use LinksClient;
    use TagsClient;

    protected $timeout = null;
    protected $token = null;
    protected $apiUrl = '';

    public function __construct()
    {
        $this->timeout = config('laravel-portugal.http.timeout');
        $this->apiUrl = config('laravel-portugal.api_url');
    }

    public function http()
    {
        $pendingRequest = Http::baseUrl($this->apiUrl);

        if ($this->timeout) {
            $pendingRequest->timeout($this->timeout);
        }

        if ($this->token) {
            $pendingRequest->withToken($this->token);
        }

        return $pendingRequest;
    }

    protected function dataToMultipart(array $data): array
    {
        return collect(explode('&', http_build_query($data)))
            ->map(function ($field) {
                [$name, $value] = explode('=', $field);

                return [
                    'name' => urldecode($name),
                    'contents' => urldecode($value),
                ];
            })
            ->all();
    }

    public function status()
    {
        return optional($this->response)->status();
    }

    public function json()
    {
        return optional($this->response)->json();
    }
}
