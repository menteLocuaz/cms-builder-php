<?php

use Arancamon\CmsBuilderPhp\Controllers\TemplateController;
use Arancamon\CmsBuilderPhp\Controllers\DashboardController;
use Arancamon\CmsBuilderPhp\Core\View;

$routesArray = explode('/', $_SERVER['REQUEST_URI']);
array_shift($routesArray);

foreach ($routesArray as $key => $value) {
    $routesArray[$key] = explode('?', $value)[0];
}

if (isset($_SESSION['admin'])) {
    if (isset($routesArray[0]) && $routesArray[0] === 'logout') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            session_destroy();
            header('Location: ' . BASE_URL);
            exit;
        }
        View::render('Pages/logout/logout', ['title' => 'Logout']);
        exit;
    }

    $dashboard = new DashboardController();
    $dashboard->dashboard();
} else {
    if (isset($routesArray[0]) && $routesArray[0] === 'logout') {
        unset($_SESSION['admin']);
        header('Location: ' . BASE_URL);
        exit;
    }

    $index = new TemplateController();
    $index->Index();
}
