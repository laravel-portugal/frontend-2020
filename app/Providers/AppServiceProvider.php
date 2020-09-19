<?php

namespace App\Providers;

use App\ClientInterface;
use App\FakeClient;
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
        $this->app->bind(ClientInterface::class, function($app) {
            if ($this->app->environment('local')) {
                return new FakeClient();
            }
            throw new \DomainException('Implement real Api Client');
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
