<?php

namespace Kelcampus\LaravelRepositoy;

use Kelcampus\LaravelRepositoy\Contracts\Fractal\Factory as FractalFactoryContract;
use Kelcampus\LaravelRepositoy\Fractal\Factory as FractalFactory;
use Illuminate\Support\ServiceProvider;

class LaravelRepositoyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $resourcesDir = __DIR__.'/../resources/';
        $this->publishes([$resourcesDir.'config/laravelRepository.php' => config_path('laravelRepository.php')]);

        $this->mergeConfigFrom($resourcesDir.'config/laravelRepository.php', 'laravelRepository');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FractalFactoryContract::class, FractalFactory::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [FractalFactoryContract::class];
    }
}