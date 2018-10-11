<?php

namespace bilyuk\Sendinblue;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register Sendinblue API client
        $this->app->singleton(Client::class, function ($app)
        {
            return new Client($app['config']['services.sendinblue.v3']);
        });
        $this->app->alias(Client::class, 'sendinblue');
    }
}