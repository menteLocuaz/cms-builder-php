<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Database\Connection;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateAdminsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateColumnsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateModulesTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreatePagestable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateSettingsTable;
use PDO;
use PDOException;

class InstallController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    public function install(): array
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['success' => false, 'message' => ''];
        }

        if (empty($_POST['email_admin'])) {
            return ['success' => false, 'message' => 'El correo del administrador es obligatorio.'];
        }

        try {
            $this->db->beginTransaction();

            new CreateAdminsTable()->up();
            new CreatePagestable()->up();
            new CreateSettingsTable()->up();
            new CreateColumnsTable()->up();
            new CreateModulesTable()->up();

            if ($this->adminExists($_POST['email_admin'])) {
                $this->db->rollBack();
                return ['success' => false, 'message' => 'El correo ya está registrado.'];
            }

            $this->insertAdmin();

            $this->db->commit();

            return ['success' => true, 'message' => 'Instalación completada correctamente.'];
        } catch (PDOException $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => 'Error durante la instalación: ' . $e->getMessage()];
        }
    }

    private function adminExists(string $email): bool
    {
        $stmt = $this->db->prepare('SELECT 1 FROM admins WHERE email_admin = :email');
        $stmt->execute([':email' => $email]);
        return (bool) $stmt->fetchColumn();
    }

    private function insertAdmin(): void
    {
        $stmt = $this->db->prepare('INSERT INTO admins (
                email_admin,
                password_admin,
                title_admin,
                symbol_admin,
                font_admin,
                color_admin,
                back_admin
            ) VALUES (
                :email,
                :password,
                :title,
                :symbol,
                :font,
                :color,
                :back
            )');

        $stmt->execute([
            ':email' => $_POST['email_admin'],
            ':password' => password_hash($_POST['password_admin'], PASSWORD_BCRYPT),
            ':title' => $_POST['title_admin'],
            ':symbol' => $_POST['symbol_admin'],
            ':font' => $_POST['font_admin'],
            ':color' => $_POST['color_admin'],
            ':back' => $_POST['back_admin'],
        ]);
    }
}
