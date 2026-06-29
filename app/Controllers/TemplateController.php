<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Core\View;
use Arancamon\CmsBuilderPhp\Database\Connection;
use PDOException;

class TemplateController
{
    public function Index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            if (isset($_POST['email_admin']) && isset($_POST['password_admin'])) {
                $login = new LoginController();
                echo json_encode($login->login());
                exit();
            }

            $install = new InstallController();
            echo json_encode($install->install());
            exit();
        }

        try {
            $pdo = Connection::connect();
            $stmt = $pdo->query('SELECT * FROM admins LIMIT 1');
            $admin = $stmt->fetch();
        } catch (PDOException $e) {
            $admin = false;
        }

        if ($admin === false) {
            View::render('Pages/install/install', [
                'title' => 'Instalación',
                'useSweetAlert' => true,
                'useFormsJs' => true,
                'useNProgress' => true,
            ]);
        } else {
            View::render('Pages/login/login', [
                'title' => 'Login',
                'admin' => $admin,
                'useSweetAlert' => true,
                'useFormsJs' => true,
                'useNProgress' => true,
            ]);
        }
    }
}
