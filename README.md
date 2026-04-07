# Filament Compass

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aldesrahim/filament-compass.svg?style=flat-square)](https://packagist.org/packages/aldesrahim/filament-compass)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/aldesrahim/filament-compass-pkg/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aldesrahim/filament-compass-pkg/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/aldesrahim/filament-compass-pkg/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/aldesrahim/filament-compass-pkg/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/aldesrahim/filament-compass.svg?style=flat-square)](https://packagist.org/packages/aldesrahim/filament-compass)

Comprehensive documentation for Filament v5, designed for LLMs and AI-assisted development.

## Installation

You can install the package via composer:

```bash
composer require aldesrahim/filament-compass
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-compass-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-compass-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-compass-views"
```

## Usage

After installation, Filament Compass provides comprehensive Filament v5 documentation optimized for LLMs and AI-assisted development. Refer to the published config file to customize its behavior.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Al Desrahim](https://github.com/aldesrahim)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
