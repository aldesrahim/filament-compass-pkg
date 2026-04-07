<?php

namespace Aldesrahim\FilamentCompass\Commands;

use Illuminate\Console\Command;

class FilamentCompassCommand extends Command
{
    public $signature = 'filament-compass';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
