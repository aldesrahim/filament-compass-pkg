<?php

namespace Aldesrahim\FilamentCompass\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aldesrahim\FilamentCompass\FilamentCompass
 */
class FilamentCompass extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Aldesrahim\FilamentCompass\FilamentCompass::class;
    }
}
