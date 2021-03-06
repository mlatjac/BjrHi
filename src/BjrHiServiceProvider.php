<?php

namespace Mlatjac\BjrHi;

use Illuminate\Support\ServiceProvider;

class BjrHiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mlatjac');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mlatjac');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bjrhi.php', 'bjrhi');

        // Register the service the package provides.
        $this->app->singleton('bjrhi', function ($app) {
            return new BjrHi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bjrhi'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/bjrhi.php' => config_path('bjrhi.php'),
        ], 'bjrhi.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mlatjac'),
        ], 'bjrhi.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mlatjac'),
        ], 'bjrhi.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mlatjac'),
        ], 'bjrhi.views');*/

        // Registering package commands.
        $this->commands([
            InstallBjrHi::class,
        ]);
    }
}
