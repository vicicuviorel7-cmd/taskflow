<?php

declare(strict_types=1);

namespace TaskFlow\Config;

final class Requirements
{
    public static function roles(): array
    {
        return [
            [
                'name' => 'Administrator',
                'icon' => 'AD',
                'description' =>
                    'Administrează utilizatorii și rolurile.'
            ],
            [
                'name' => 'Manager de proiect',
                'icon' => 'MP',
                'description' =>
                    'Gestionează proiectele, echipele și rapoartele.'
            ],
            [
                'name' => 'Membru al echipei',
                'icon' => 'ME',
                'description' =>
                    'Realizează sarcini și înregistrează pontajul.'
            ]
        ];
    }

    public static function functional(): array
    {
        return [
            'CF01' => 'Înregistrarea utilizatorilor',
            'CF02' => 'Autentificare și deconectare',
            'CF03' => 'Gestionarea rolurilor',
            'CF04' => 'Gestionarea proiectelor',
            'CF05' => 'Gestionarea echipelor',
            'CF06' => 'Gestionarea sarcinilor',
            'CF07' => 'Panou Kanban drag-and-drop',
            'CF08' => 'Gestionarea dependențelor',
            'CF09' => 'Înregistrarea pontajului',
            'CF10' => 'Calcularea drumului critic CPM',
            'CF11' => 'Compararea efortului',
            'CF12' => 'Gestionarea comentariilor',
            'CF13' => 'Încărcarea atașamentelor',
            'CF14' => 'Import și export CSV sau JSON',
            'CF15' => 'Filtrare, sortare și paginare',
            'CF16' => 'API REST',
            'CF17' => 'Integrare API extern',
            'CF18' => 'Opțiunea Ține-mă minte'
        ];
    }

    public static function technical(): array
    {
        return [
            'CN01' => 'PHP 8.4+ / PHP 8.5 local',
            'CN02' => 'Composer și PSR-4',
            'CN03' => 'Standard PSR-12',
            'CN04' => 'MVC și Repository',
            'CN05' => 'MySQL / MariaDB',
            'CN06' => 'PDO și prepared statements',
            'CN07' => 'CSRF și antete de securitate',
            'CN08' => 'Password hashing',
            'CN09' => 'Variabile de mediu',
            'CN10' => 'Design responsive',
            'CN11' => 'Minimum 25 teste PHPUnit',
            'CN12' => 'Minimum 20 commit-uri',
            'CN13' => 'Minimum 5 endpoint-uri REST',
            'CN14' => 'OWASP Top 10:2025',
            'CN15' => 'Publicarea aplicației',
            'CN16' => 'Validare și PRG',
            'CN17' => 'POO modern',
            'CN18' => 'Migrări și tranzacții',
            'CN19' => 'Limitarea autentificărilor',
            'CN20' => 'Jurnalizare și excepții',
            'CN21' => 'Front controller și rutare'
        ];
    }

    public static function entities(): array
    {
        return [
            'utilizatori',
            'roluri',
            'proiecte',
            'echipe',
            'membri_echipe',
            'proiecte_echipe',
            'sarcini',
            'dependente',
            'pontaje',
            'comentarii',
            'atasamente',
            'remember_tokens',
            'api_tokens',
            'login_attempts',
            'audit_logs'
        ];
    }
}