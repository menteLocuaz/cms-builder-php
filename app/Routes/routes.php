<?php

use Arancamon\CmsBuilderPhp\Controllers\TemplateController;

$routesArray = explode('/', $_SERVER['REQUEST_URI']);
array_shift($routesArray);

foreach ($routesArray as $key => $value) {
    $routesArray[$key] = explode('?', $value)[0];
}

$index = new TemplateController();

$index->Index();
