<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/.project',
        __DIR__ . '/Build',
        __DIR__ . '/Classes',
        __DIR__ . '/Configuration',
        __DIR__ . '/Tests',
        __DIR__ . '/ext_localconf.php',

        __DIR__ . '/.php-cs-fixer.php',
        __DIR__ . '/fractor.php',
        __DIR__ . '/rector.php',
    ])
    ->withPhpVersion(\Rector\ValueObject\PhpVersion::PHP_84)
    ->withImportNames(false, true, false, true)
    ->withSets([
        \Rector\Set\ValueObject\SetList::CODE_QUALITY,
        \Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_84,

        Typo3SetList::CODE_QUALITY,
        Typo3SetList::GENERAL,
        Typo3LevelSetList::UP_TO_TYPO3_13,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
    ]);
