<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database;

use PDO;
use PDOException;

class Connection
{
    /**
     * Retorna la configuración de la base de datos.
     */
    public static function infoDatabase(): array
    {
        return [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'database' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
        ];
    }

    /**
     * Crea la conexión con PostgreSQL.
     */
    public static function connect(): PDO
    {
        $config = self::infoDatabase();

        $dsn = sprintf('pgsql:host=%s;port=%d;dbname=%s', $config['host'], $config['port'], $config['database']);

        try {
            return new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new PDOException('Error al conectar con PostgreSQL: ' . $e->getMessage(), (int) $e->getCode());
        }
    }
}
