<?php
session_start();

use App\Core\Core;

require_once('./../vendor/autoload.php');

$dotenv = \Dotenv\Dotenv::createImmutable('./../');
$dotenv->load();

$core = new Core();
$core->run( $_GET );
