<?php

ob_start();
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$baseUrl = sprintf(
    '%s://%s/',
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http',
    $_SERVER['HTTP_HOST']
);
define('BASE_URL', $baseUrl);
define('ASSETS', BASE_URL);
define('APP', __DIR__ . '/../app');

function database_path(string $path = ''): string
{
    return __DIR__ . '/../database' . ($path ? '/' . $path : $path);
}

include APP . '/Routes/routes.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', APP . '/storage/php_error_log');
