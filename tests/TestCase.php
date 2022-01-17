<?php

namespace Rescaled\SimpleFeature\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rescaled\SimpleFeature\SimpleFeatureServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SimpleFeatureServiceProvider::class,
        ];
    }
}
