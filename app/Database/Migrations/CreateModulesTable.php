<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Migrations;

use Arancamon\CmsBuilderPhp\Database\Connection;

class CreateModulesTable
{
    public function up(): void
    {
        $sql = <<<SQL
                CREATE TABLE IF NOT EXISTS modules (
                id_module BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
                id_page_module BIGINT DEFAULT 0,
                type_module TEXT,
                title_module TEXT,
                suffix_module TEXT,
                content_module TEXT,
                width_module INT DEFAULT 100,
                editable_module INT DEFAULT 1,
                date_created_module DATE,
                date_updated_module TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );          
            SQL;
        Connection::connect()->exec($sql);
    }
}
