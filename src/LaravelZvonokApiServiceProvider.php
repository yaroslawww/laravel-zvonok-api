<?php

namespace GCSC\LaravelZvonokApi;

use Illuminate\Support\ServiceProvider;

class LaravelZvonokApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-zvonok-api.php' => config_path('laravel-zvonok-api.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->singleton('laravel-zvonok-api-client', function ($app) {
            return new LaravelZvonokApiClient();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/laravel-zvonok-api.php', 'laravel-zvonok-api');
    }
}
