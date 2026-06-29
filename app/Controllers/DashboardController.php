<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Core\View;

class DashboardController
{
    public function dashboard(): void
    {
        $admin = $_SESSION['admin'] ?? null;

        if (!$admin) {
            header('Location: ' . BASE_URL);
            exit();
        }

        View::render('Pages/dashboard/dashboard', [
            'title' => 'Dashboard',
            'admin' => $admin,
            'useNProgress' => true,
        ]);
    }
}

