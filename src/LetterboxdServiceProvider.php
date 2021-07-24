<?php

namespace NuoviMedia\LetterboxdClient;

use Illuminate\Support\ServiceProvider;

class LetterboxdServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootrstraps the application events
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/letterboxd.php' => config_path('letterboxd.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../config/letterboxd.php', 'letterboxd',
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}