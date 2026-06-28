<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Core\View;

class TemplateController
{
    public function Index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $install = new InstallController();
            echo json_encode($install->install());
            exit;
        }

        View::render('Pages/install/install', [
            'title'         => 'Instalación',
            'useSweetAlert' => true,
            'useFormsJs'    => true,
        ]);
    }
}
