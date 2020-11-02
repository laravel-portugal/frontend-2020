<?php

namespace App\Providers;

use App\Http\Clients\ApiClient;
use App\Http\Clients\FakeClient;
use App\Http\Clients\RealClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiClient::class, function ($app) {
            if (ApiClient::isFake()) {
                return new FakeClient();
            }

            return new RealClient();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
