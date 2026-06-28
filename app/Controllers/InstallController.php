<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Database\Connection;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateAdminsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateColumnsTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateModulesTable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreatePagestable;
use Arancamon\CmsBuilderPhp\Database\Migrations\CreateSettingsTable;
use Arancamon\CmsBuilderPhp\Services\CurlController;
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
        $url = "admins?register=true&suffix=admin";
        $method = "POST";
        $fields = [
            "email_admin" => trim($_POST["email_admin"]),
            "password_admin" => trim($_POST["password_admin"]),
            "rol_admin" => "superadmin",
            "permissions_admin" => '{"todo":"on"}',
            "title_admin" => trim($_POST["title_admin"]),
            "symbol_admin" => trim($_POST["symbol_admin"]),
            "font_admin" => trim($_POST["font_admin"]),
            "color_admin" => trim($_POST["color_admin"]),
            "back_admin" => trim($_POST["back_admin"]),
            "date_created_admin" => date("Y-m-d"),
        ];

        CurlController::request($url, $method, $fields);
    }
}
