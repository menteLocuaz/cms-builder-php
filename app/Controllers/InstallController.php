<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Database\Connection;
use Arancamon\CmsBuilderPhp\Database\Seeders\AdminSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\ColumnSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\ModuleSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\PageSeeder;
use Arancamon\CmsBuilderPhp\Database\Seeders\SeederRunner;
use Arancamon\CmsBuilderPhp\Database\MigrationRunner;
use Arancamon\CmsBuilderPhp\Install\InstallService;
use Arancamon\CmsBuilderPhp\Repositories\AdminRepository;
use Arancamon\CmsBuilderPhp\Repositories\ColumnRepository;
use Arancamon\CmsBuilderPhp\Repositories\ModuleRepository;
use Arancamon\CmsBuilderPhp\Repositories\PageRepository;
use Arancamon\CmsBuilderPhp\Services\AdminService;
use Arancamon\CmsBuilderPhp\Services\ColumnService;
use Arancamon\CmsBuilderPhp\Services\ModuleService;
use Arancamon\CmsBuilderPhp\Services\PageService;

class InstallController
{
    private InstallService $installService;

    public function __construct()
    {
        $pageRepository = new PageRepository(Connection::connect());
        $moduleRepository = new ModuleRepository(Connection::connect());
        $columnRepository = new ColumnRepository(Connection::connect());

        $pageService = new PageService($pageRepository);
        $moduleService = new ModuleService($moduleRepository);
        $columnService = new ColumnService($columnRepository);

        $pageSeeder = new PageSeeder($pageService);
        $moduleSeeder = new ModuleSeeder($moduleService);
        $columnSeeder = new ColumnSeeder($columnService);

        $adminRepository = new AdminRepository(Connection::connect());
        $adminService = new AdminService($adminRepository);
        $adminSeeder = new AdminSeeder($adminService);

        $seederRunner = new SeederRunner(
            $adminSeeder,
            $pageSeeder,
            $moduleSeeder,
            $columnSeeder
        );

        $migrationRunner = new MigrationRunner();

        $this->installService = new InstallService($migrationRunner, $seederRunner);
    }

    public function install(): array
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['success' => false, 'message' => ''];
        }

        return $this->installService->install($_POST);
    }
}
