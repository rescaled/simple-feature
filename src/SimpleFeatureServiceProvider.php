<?php

namespace Rescaled\SimpleFeature;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Rescaled\SimpleFeature\Middleware\RequireDisabledFeature;
use Rescaled\SimpleFeature\Middleware\RequireEnabledFeature;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SimpleFeatureServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('simple-feature');
    }

    public function registeringPackage()
    {
        $this->app->singleton(SimpleFeature::class, function ($app) {
            return new SimpleFeature();
        });

        $this->registerMiddleware();
        $this->registerBladeDirectives();
    }

    public function registerMiddleware(): void
    {
        /** @var Router $router */
        $router = $this->app['router'];

        $router->aliasMiddleware('feature.enabled', RequireEnabledFeature::class);
        $router->aliasMiddleware('feature.disabled', RequireDisabledFeature::class);
    }

    public function registerBladeDirectives(): void
    {
        Blade::if('feature', function ($value) {
            return \Rescaled\SimpleFeature\Facades\SimpleFeature::enabled($value);
        });
    }
}
