<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

use Arancamon\CmsBuilderPhp\Database\Connection;

class installController
{
    // instalacion del sistema
    public function install()
    {
        if (isset($_POST['email_admin'])) {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            // conexion
            echo '<pre>';
            print_r(Connection::connect());
            echo '</pre>';
        }
    }
}
