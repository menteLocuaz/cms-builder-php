<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Install;

use Arancamon\CmsBuilderPhp\Database\Connection;
use Arancamon\CmsBuilderPhp\Database\MigrationRunner;
use Arancamon\CmsBuilderPhp\Database\Seeders\SeederRunner;
use Arancamon\CmsBuilderPhp\Repositories\AdminRepository;
use PDO;
use PDOException;

class InstallService
{
    private PDO $db;
    private string $today;

    public function __construct(
        private MigrationRunner $migrationRunner,
        private SeederRunner $seederRunner,
    ) {
        $this->db = Connection::connect();
        $this->today = date('Y-m-d');
    }

    public function install(array $postData): array
    {
        if (empty($postData['email_admin'])) {
            return ['success' => false, 'message' => 'El correo del administrador es obligatorio.'];
        }

        try {
            $this->db->beginTransaction();

            $this->migrationRunner->run();

            $adminRepository = new AdminRepository($this->db);
            if ($adminRepository->existsByEmail($postData['email_admin'])) {
                $this->db->rollBack();
                return ['success' => false, 'message' => 'El correo ya está registrado.'];
            }

            $this->seederRunner->run($postData, $this->today);

            $this->db->commit();

            return ['success' => true, 'message' => 'Instalación completada correctamente.'];
        } catch (PDOException $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => 'Error durante la instalación: ' . $e->getMessage()];
        }
    }
}
