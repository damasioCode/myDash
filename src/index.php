<?php
session_start();

use \App\Core\Core;

// return var_dump(__DIR__);

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$core = new Core();
$core->run( $_GET );
