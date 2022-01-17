<?php

namespace Rescaled\SimpleFeature\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rescaled\SimpleFeature\SimpleFeature
 * @method static bool enabled(string $feature, bool $default = false)
 * @method static bool disabled(string $feature, bool $default = false)
 * @method static bool allEnabled(array $features, bool $default = false)
 * @method static bool allDisabled(array $features, bool $default = false)
 * @method static bool|null state(string $feature)
 */
class SimpleFeature extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rescaled\SimpleFeature\SimpleFeature::class;
    }
}
