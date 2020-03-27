<?php

require_once __DIR__. "/../vendor/autoload.php";

$dotenv = \Dotenv\Dotenv::create(__DIR__."/../");
$dotenv->load();
require_once "../config/config.php";


session_start();
$app = new Core\App();
require_once '../routes/web.php';
$app->init();