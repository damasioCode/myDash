<?php
session_start();

use App\Core\Core;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$core = new Core();
var_dump($core);
    $core->run( $_GET );
