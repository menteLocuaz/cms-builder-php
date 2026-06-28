<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

use Arancamon\CmsBuilderPhp\Database\Seeders\AdminSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\PageSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\ModuleSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\ColumnSeeder;

class SeederRunner
{
    public function __construct(
        private AdminSeeder $adminSeeder,
        private PageSeeder $pageSeeder,
        private ModuleSeeder $moduleSeeder,
        private ColumnSeeder $columnSeeder
    ) {}

    public function run(array $postData, string $today): void
    {
        $this->adminSeeder->run($postData, $today);

        $pageIds = $this->pageSeeder->run($today);

        $moduleIds = $this->moduleSeeder->run($pageIds, $today);

        $this->columnSeeder->run($moduleIds['table'], $today);
    }
}
