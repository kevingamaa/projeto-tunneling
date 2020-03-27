<?php

require_once "../config/config.php";

require_once __DIR__. "/../vendor/autoload.php";

session_start();
$app = new Core\App();
require_once '../routes/web.php';
$app->init();