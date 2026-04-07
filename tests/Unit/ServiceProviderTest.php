<?php

use Aldesrahim\FilamentCompass\FilamentCompassServiceProvider;

it('is registered in the application', function () {
    expect(app()->getProvider(FilamentCompassServiceProvider::class))
        ->toBeInstanceOf(FilamentCompassServiceProvider::class);
});

it('registers the package under the filament-compass name', function () {
    $provider = app()->getProvider(FilamentCompassServiceProvider::class);

    expect($provider)->toBeInstanceOf(FilamentCompassServiceProvider::class);

    $reflection = new ReflectionClass($provider);
    $method = $reflection->getMethod('configurePackage');

    $package = new Spatie\LaravelPackageTools\Package;
    $method->invoke($provider, $package);

    expect($package->name)->toBe('filament-compass');
});
