<?php

use Rescaled\SimpleFeature\Facades\SimpleFeature;

it('indicates a feature is enabled', function () {
    expect(SimpleFeature::enabled('exampleEnabled'))->toBeTrue();
    expect(SimpleFeature::enabled('exampleDisabled'))->toBeFalse();
});

it('indicates a feature is disabled', function () {
    expect(SimpleFeature::disabled('exampleEnabled'))->toBeFalse();
    expect(SimpleFeature::disabled('exampleDisabled'))->toBeTrue();
});

it('falls back to the given default', function () {
    expect(SimpleFeature::enabled('doesNotExist', true))->toBeTrue();
    expect(SimpleFeature::enabled('doesNotExist', false))->toBeFalse();

    expect(SimpleFeature::disabled('doesNotExist', true))->toBeTrue();
    expect(SimpleFeature::disabled('doesNotExist', false))->toBeFalse();
});

it('falls back to the standard default', function () {
    expect(SimpleFeature::enabled('doesNotExist'))->toBeFalse();
    expect(SimpleFeature::disabled('doesNotExist'))->toBeTrue();
});

it('ignores the default when the flag is provided', function () {
    expect(SimpleFeature::enabled('exampleEnabled', false))->toBeTrue();
    expect(SimpleFeature::enabled('exampleDisabled', true))->toBeFalse();

    expect(SimpleFeature::disabled('exampleDisabled', false))->toBeTrue();
    expect(SimpleFeature::disabled('exampleEnabled', true))->toBeFalse();
});

it('indicates all features are enabled', function () {
    expect(SimpleFeature::allEnabled(['exampleEnabled']))->toBeTrue();
    expect(SimpleFeature::allEnabled(['exampleEnabled', 'exampleDisabled']))->toBeFalse();
});

it('indicates all feature are disabled', function () {
    expect(SimpleFeature::allDisabled(['exampleDisabled']))->toBeTrue();
    expect(SimpleFeature::allDisabled(['exampleDisabled', 'exampleEnabled']))->toBeFalse();
});
