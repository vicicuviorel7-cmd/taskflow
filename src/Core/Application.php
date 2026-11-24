<?php

declare(strict_types=1);

namespace TaskFlow\Core;

use TaskFlow\Config\AppConfig;

final class Application
{
    public function getName(): string
    {
        return AppConfig::NAME;
    }

    public function getVersion(): string
    {
        return AppConfig::VERSION;
    }

    public function getModules(): array
    {
        return [
            ['01', 'Proiecte',
                'Organizarea și monitorizarea proiectelor.'],

            ['02', 'Echipe',
                'Gestionarea membrilor și responsabilităților.'],

            ['03', 'Kanban',
                'Administrarea sarcinilor și progresului.'],

            ['04', 'Pontaj',
                'Monitorizarea orelor de lucru.'],

            ['05', 'Drumul critic',
                'Calcularea duratei proiectului prin CPM.'],

            ['06', 'Rapoarte',
                'Compararea efortului planificat și realizat.']
        ];
    }

    public function getEnvironment(): array
    {
        return [
            'php' => PHP_VERSION,
            'composer' => class_exists(
                \Composer\Autoload\ClassLoader::class
            ),
            'psr4' => class_exists(AppConfig::class),
            'compatible' => AppConfig::isPhpCompatible()
        ];
    }
}