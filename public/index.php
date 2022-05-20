<?php
session_start();

use App\Core;

require_once('../vendor/autoload.php');

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$core = new Core\Core();
$core->run( $_GET );
