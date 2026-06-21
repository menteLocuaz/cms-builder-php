<?php

namespace Arancamon\CmsBuilderPhp\Controllers;

class TemplateController
{
    public function Index()
    {
        include __DIR__ . '/../Views/templates.php';
    }
}
