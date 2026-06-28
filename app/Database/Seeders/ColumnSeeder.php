<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

use Arancamon\CmsBuilderPhp\Services\ColumnService;

class ColumnSeeder
{
    public function __construct(
        private ColumnService $columnService
    ) {}

    public function run(int $moduleId, string $today): bool
    {
        $columns = require database_path('seeders/data/admin_columns.php');
        $count = 0;

        foreach ($columns as $column) {
            $this->columnService->create([
                'id_module_column' => $moduleId,
                'title_column' => $column['title_column'],
                'alias_column' => $column['alias_column'],
                'type_column' => $column['type_column'],
                'matrix_column' => $column['matrix_column'],
                'visible_column' => $column['visible_column'],
                'date_created_column' => $today,
            ]);
            $count++;
        }

        return $count === count($columns);
    }
}
