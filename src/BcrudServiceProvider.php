<?php

namespace Bipin\Bcrud;

use Illuminate\Support\ServiceProvider;

class BcrudServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'bipin');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'bipin');
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
        $this->mergeConfigFrom(__DIR__.'/../config/bcrud.php', 'bcrud');

        // Register the service the package provides.
        $this->app->singleton('bcrud', function ($app) {
            return new Bcrud;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bcrud'];
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
            __DIR__.'/../config/bcrud.php' => config_path('bcrud.php'),
        ], 'bcrud.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/bipin'),
        ], 'bcrud.views');*/

        // publish stubs
         $this->publishes([
            __DIR__.'/../resources/stubs' => base_path('resources/views/vendor/bipin'),
        ], 'bcrud.stubs');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/bipin'),
        ], 'bcrud.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/bipin'),
        ], 'bcrud.views');*/

        // Registering package commands.
        $this->commands([Commands\BcrudCommand::class]);
    }
}
