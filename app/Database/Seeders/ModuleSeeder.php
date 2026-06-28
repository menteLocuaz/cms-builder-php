<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

use Arancamon\CmsBuilderPhp\Services\ModuleService;

class ModuleSeeder
{
    public function __construct(
        private ModuleService $moduleService
    ) {}

    public function run(array $pageIds, string $today): array
    {
        $modulesData = require database_path('seeders/data/modules.php');
        $moduleIds = [];

        $adminPageId = $pageIds['admins'];

        foreach ($modulesData as $key => $module) {
            $moduleIds[$key] = $this->moduleService->create([
                'id_page_module' => $adminPageId,
                'type_module' => $module['type_module'],
                'title_module' => $module['title_module'],
                'suffix_module' => $module['suffix_module'] ?? null,
                'editable_module' => $module['editable_module'] ?? 1,
                'date_created_module' => $today,
            ]);
        }

        return $moduleIds;
    }
}
