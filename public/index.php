<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// requeriminetos
include __DIR__ . '/../app/Routes/routes.php';
// depurar errores
define('DIR', __DIR__);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', DIR . '../storage/php_error_log');
