<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Database\Connection;

class LoginController
{
    public function login(): array
    {
        if (!isset($_POST['email_admin'], $_POST['password_admin'])) {
            return [
                'success' => false,
                'message' => 'Datos incomplete',
            ];
        }

        $email = trim($_POST['email_admin']);
        $password = trim($_POST['password_admin']);

        if (empty($email) || empty($password)) {
            return [
                'success' => false,
                'message' => 'Complete todos los campos',
            ];
        }

        try {
            $pdo = Connection::connect();
            $stmt = $pdo->prepare('SELECT * FROM admins WHERE email_admin = :email LIMIT 1');
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if (!$admin) {
                return [
                    'success' => false,
                    'message' => 'Credenciales incorrectas',
                ];
            }

            if ($admin['status_admin'] == 0) {
                return [
                    'success' => false,
                    'message' => 'Administrador desactivado',
                ];
            }

            if (!password_verify($password, $admin['password_admin'])) {
                return [
                    'success' => false,
                    'message' => 'Credenciales incorrectas',
                ];
            }

            $_SESSION['admin'] = $admin;

            return [
                'success' => true,
                'message' => 'Ingreso exitoso',
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Error de conexión',
            ];
        }
    }
}
