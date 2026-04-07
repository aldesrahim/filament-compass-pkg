<?php

use Aldesrahim\FilamentCompass\FilamentCompassServiceProvider;
use Spatie\LaravelPackageTools\Package;

it('is registered in the application', function () {
    expect(app()->getProvider(FilamentCompassServiceProvider::class))
        ->toBeInstanceOf(FilamentCompassServiceProvider::class);
});

it('registers the package under the filament-compass name', function () {
    $provider = app()->getProvider(FilamentCompassServiceProvider::class);

    expect($provider)->toBeInstanceOf(FilamentCompassServiceProvider::class);

    $reflection = new ReflectionClass($provider);
    $method = $reflection->getMethod('configurePackage');

    $package = new Package;
    $method->invoke($provider, $package);

    expect($package->name)->toBe('filament-compass');
});
