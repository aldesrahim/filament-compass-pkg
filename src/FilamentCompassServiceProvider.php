<?php

namespace Aldesrahim\FilamentCompass;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Aldesrahim\FilamentCompass\Commands\FilamentCompassCommand;

class FilamentCompassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-compass')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_compass_table')
            ->hasCommand(FilamentCompassCommand::class);
    }
}
