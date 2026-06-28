<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Migrations;

use Arancamon\CmsBuilderPhp\Database\Connection;

class CreateSettingsTable
{
    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS settings (
                id_setting BIGSERIAL PRIMARY KEY,
                key_setting VARCHAR(100) UNIQUE NOT NULL,
                value_setting TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            SQL;

        Connection::connect()->exec($sql);
    }
}
