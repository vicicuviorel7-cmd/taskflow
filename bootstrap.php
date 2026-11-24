<?php

declare(strict_types=1);

use TaskFlow\Core\Application;

$autoload = __DIR__ . '/vendor/autoload.php';

if (!is_file($autoload)) {
    http_response_code(503);

    exit('Executați comanda composer install.');
}

require_once $autoload;

date_default_timezone_set('Europe/Chisinau');

return new Application();