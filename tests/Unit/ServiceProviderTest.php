<?php

use Aldesrahim\FilamentCompass\FilamentCompassServiceProvider;

it('is registered in the application', function () {
    expect(app()->getProvider(FilamentCompassServiceProvider::class))
        ->toBeInstanceOf(FilamentCompassServiceProvider::class);
});
