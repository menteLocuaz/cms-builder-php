<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Migrations;

use Arancamon\CmsBuilderPhp\Database\Connection;

class CreatePagestable
{
    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS pages (
                id_page BIGSERIAL PRIMARY KEY,
                title_page TEXT DEFAULT NULL,
                url_page TEXT DEFAULT NULL,
                icon_page TEXT DEFAULT NULL,
                type_page TEXT DEFAULT NULL,
                order_page INT DEFAULT 1,
                date_created_page DATE DEFAULT NULL,
                date_updated_page TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );    
            SQL;
        Connection::connect()->exec($sql);
    }
}
