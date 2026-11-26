<?php

declare(strict_types=1);

use TaskFlow\Config\AppConfig;

$app = require dirname(__DIR__) . '/bootstrap.php';

$modules = $app->getModules();
$environment = $app->getEnvironment();

// Commit 4 - Dashboard

$title = 'TaskFlow - Dashboard';

$view = dirname(__DIR__) . '/views/dashboard/index.php';

require dirname(__DIR__) . '/views/layouts/main.php';
