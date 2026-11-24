<?php

declare(strict_types=1);

namespace TaskFlow\Config;

final class AppConfig
{
    public const NAME = 'TaskFlow';
    public const VERSION = '0.2.0';
    public const AUTHOR = 'Vicicu Viorel';
    public const GROUP = 'IT2501';
    public const VARIANT = 15;
    public const MIN_PHP_VERSION = '8.4.0';

    public static function isPhpCompatible(): bool
    {
        return version_compare(
            PHP_VERSION,
            self::MIN_PHP_VERSION,
            '>='
        );
    }
}