<?php
session_start();

use App\Core;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('./../', '.env');
$dotenv->load();

$core = new Core\Core();
$core->run( $_GET );
