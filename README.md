# Simple Feature

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rescaled/simple-feature.svg?style=flat-square)](https://packagist.org/packages/rescaled/simple-feature)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/rescaled/simple-feature/run-tests?label=tests)](https://github.com/rescaled/simple-feature/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/rescaled/simple-feature/Check%20&%20fix%20styling?label=code%20style)](https://github.com/rescaled/simple-feature/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rescaled/simple-feature.svg?style=flat-square)](https://packagist.org/packages/rescaled/simple-feature)

Simple Feature allows you to define feature flags via environment variables and check for their state within
your Laravel application. It also provides pre-defined middleware you can utilize for this use case.

## Installation

You can install the package via composer:

```bash
composer require rescaled/simple-feature
```

## Usage

### Define feature flags
Feature flags are defined in your environment file. They must be defined in snake case as well as being prefixed with `FEATURE_`.

```dotenv
FEATURE_FIRST_TEST=true
FEATURE_SECOND_TEST=true

FEATURE_THIRD_TEST=false
FEATURE_FOURTH_TEST=false
```

### Direct usage
You can directly access the package's methods as following.

```php
SimpleFeature::enabled('firstTest') // true
SimpleFeature::disabled('firstTest') // false
SimpleFeature::allEnabled(['firstTest', 'secondTest']) // true
SimpleFeature::allDisabled(['thirdTest', 'fourthTest']) // true
SimpleFeature::allEnabled(['firstTest', 'thirdTest']) // false
SimpleFeature::allDisabled(['firstTest', 'thirdTest']) // false
```

### Middleware
The package comes with two middlewares that allow to check whether a given set of features is enabled or disabled.

```
FEATURE_REGISTRATION=true
FEATURE_ON_PREMISE=true

Route::get('/register', [RegistrationController::class, 'create'])->middleware('feature.enabled:registration');
Route::get('/billing', [BillingController, 'show'])->middleware('feature.disabled:onPremise');
```

If the feature hasn't the desired state the middleware will abort the request with a 404.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please report security vulnerabilities directly to the maintainer. You can find contact information on their GitHub profile.

## Credits

- [Tobias Hannaske](https://github.com/thannaske)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
