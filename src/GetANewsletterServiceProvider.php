<?php

namespace MartinCamen\GetANewsletter;

use Illuminate\Support\ServiceProvider;

class GetANewsletterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/getanewsletter.php' => config_path('getanewsletter.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GetANewsletterModules::class, function () {
            return new GetANewsletterModules();
        });
        $this->app->alias(GetANewsletterModules::class, 'getanewsletter');
    }
}
