<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        $content = APP . '/Views/' . $view . '.php';

        require APP . '/Views/Layouts/master.php';
    }
}
