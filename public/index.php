<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$baseUrl = sprintf(
    '%s://%s',
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http',
    $_SERVER['HTTP_HOST']
);
define('BASE_URL', $baseUrl);
define('ASSETS', BASE_URL);
define('APP', __DIR__ . '/../app');

include APP . '/Routes/routes.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', APP . '/storage/php_error_log');
