<?php
session_start();

use \App\Core\Core;

// return var_dump( $_GET );
require_once __DIR__ . '/../vendor/autoload.php';

// as duas linhas que carregam as variáveis do .env para variáveis de ambiente 
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$core = new Core();
$core->run( $_GET );
