<?php

namespace Rescaled\SimpleFeature;

use Illuminate\Support\Str;

class SimpleFeature
{
    /**
     * Checks whether a given feature is enabled or not
     * @param string $feature
     * @param bool $default
     * @return bool
     */
    public function enabled(string $feature, bool $default = false): bool
    {
        return $this->state($feature) !== null ? $this->state($feature) === true : $default;
    }

    /**
     * Checks whether a given feature is disabled or not
     * @param string $feature
     * @param bool $default
     * @return bool
     */
    public function disabled(string $feature, bool $default = true): bool
    {
        return $this->state($feature) !== null ? $this->state($feature) === false : $default;
    }

    /**
     * Checks whether all features are enabled or not
     * @param array $features
     * @param bool $default
     * @return bool
     */
    public function allEnabled(array $features, bool $default = false): bool
    {
        foreach ($features as $feature) {
            if ($this->disabled($feature, $default)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks whether all features are disabled or not
     * @param array $features
     * @param bool $default
     * @return bool
     */
    public function allDisabled(array $features, bool $default = false): bool
    {
        foreach ($features as $feature) {
            if ($this->enabled($feature, $default)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns the actual state of a feature
     * @param string $feature
     * @return bool|null
     */
    public function state(string $feature): ?bool
    {
        return env("FEATURE_" . Str::upper(Str::snake($feature)));
    }
}
