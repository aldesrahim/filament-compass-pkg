<?php

use Illuminate\Support\Facades\File;

$docsPath = __DIR__.'/../../resources/docs';
$boostPath = __DIR__.'/../../resources/boost';

it('has a non-empty docs directory', function () use ($docsPath) {
    expect(File::allFiles($docsPath))->not->toBeEmpty();
});

it('has a COMPASS.md entry point', function () use ($docsPath) {
    expect(file_exists($docsPath.'/COMPASS.md'))->toBeTrue()
        ->and(File::size($docsPath.'/COMPASS.md'))->toBeGreaterThan(0);
});

it('has all expected top-level doc files', function () use ($docsPath) {
    $expected = [
        'overview.md',
        'quick-start.md',
        'versions.md',
        'breaking-changes.md',
        'common-mistakes.md',
    ];

    foreach ($expected as $file) {
        expect(file_exists($docsPath.'/'.$file))
            ->toBeTrue("Expected docs/{$file} to exist");
    }
});

it('has no empty doc files', function () use ($docsPath) {
    foreach (File::allFiles($docsPath) as $file) {
        expect($file->getSize())
            ->toBeGreaterThan(0, "Expected {$file->getRelativePathname()} to be non-empty");
    }
});

it('has a boost guidelines file', function () use ($boostPath) {
    $guidelines = $boostPath.'/guidelines/core.blade.php';

    expect(file_exists($guidelines))->toBeTrue()
        ->and(File::size($guidelines))->toBeGreaterThan(0);
});

it('has a boost skill definition', function () use ($boostPath) {
    $skill = $boostPath.'/skills/filament-development/SKILL.md';

    expect(file_exists($skill))->toBeTrue()
        ->and(File::size($skill))->toBeGreaterThan(0);
});
