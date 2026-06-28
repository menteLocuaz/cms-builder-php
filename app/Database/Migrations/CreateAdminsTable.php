<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Migrations;

use Arancamon\CmsBuilderPhp\Database\Connection;

class CreateAdminsTable
{
    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS admins (
                id_admin BIGSERIAL PRIMARY KEY,
                email_admin VARCHAR(150) UNIQUE NOT NULL,
                password_admin TEXT NOT NULL,
                rol_admin VARCHAR(50) DEFAULT 'Administrador',
                permissions_admin JSONB,
                token_admin TEXT,
                token_exp_admin TIMESTAMP,
                status_admin SMALLINT DEFAULT 1,
                title_admin VARCHAR(150),
                symbol_admin VARCHAR(50),
                font_admin TEXT,
                color_admin VARCHAR(20),
                back_admin TEXT,
                scode_admin TEXT,
                chatgpt_admin TEXT,
                date_created_admin TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_updated_admin TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            SQL;

        Connection::connect()->exec($sql);
    }
}
