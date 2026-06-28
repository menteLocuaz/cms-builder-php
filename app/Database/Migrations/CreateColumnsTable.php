<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Migrations;

use Arancamon\CmsBuilderPhp\Database\Connection;

class CreateColumnsTable
{
    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS columns (
            id_column BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            id_module_column BIGINT DEFAULT 0,
            title_column TEXT,
            alias_column TEXT,
            type_column TEXT,
            matrix_column TEXT,
            visible_column INT DEFAULT 1,
            date_created_column DATE,
            date_updated_column TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );

            SQL;
        Connection::connect()->exec($sql);
    }
}
