<?php

namespace Tests\Unit;

use App\Http\Clients\FakeClient;
use App\Http\Clients\RealClient;
use App\Http\Clients\ApiClient;
use Tests\TestCase;

class ApiClientTest extends TestCase
{
    /** @test **/
    public function it_resolves_an_api_client_instance()
    {
        $this->assertInstanceOf(RealClient::class, resolve(ApiClient::class));
    }

    /** @test **/
    public function it_resolves_an_api_client_to_fake_instance()
    {
        ApiClient::fake();
        $this->assertInstanceOf(FakeClient::class, resolve(ApiClient::class));
    }
}
