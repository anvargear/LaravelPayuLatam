<?php

namespace AnvarCO\PayuLatam;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class PayuLatamServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__ . '/views'), 'payulatam');
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'payulatam');
        $this->setupRoutes($this->app->router);
        // this  for config
        $this->publishes([
            __DIR__ . '/config/payulatam.php' => config_path('payulatam.php'),
        ]);
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/payulatam'),
        ]);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'AnvarCO\PayuLatam\Http\Controllers'], function ($router) {
            require __DIR__ . '/Http/routes.php';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WebCheckoutData', 'AnvarCO\PayuLatam\WebCheckoutData');
    }
}
