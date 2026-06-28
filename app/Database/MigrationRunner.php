<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database;

use Arancamon\CmsBuilderPhp\Database\Migrations\CreateAdminsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreatePagestable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateSettingsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateColumnsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateModulesTable;

class MigrationRunner
{
    private const MIGRATIONS = [
        CreateAdminsTable::class,
        CreatePagestable::class,
        CreateSettingsTable::class,
        CreateColumnsTable::class,
        CreateModulesTable::class,
    ];

    public function run(): void
    {
        foreach (self::MIGRATIONS as $migration) {
            (new $migration())->up();
        }
    }
}
