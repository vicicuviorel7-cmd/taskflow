<?php

declare(strict_types=1);

use TaskFlow\Config\Requirements;
use TaskFlow\Config\AppConfig;

$app = require dirname(__DIR__) . '/bootstrap.php';

$roles = Requirements::roles();
$functional = Requirements::functional();
$technical = Requirements::technical();
$entities = Requirements::entities();

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TaskFlow - Cerințele proiectului</title>

    <link rel="stylesheet"
          href="assets/css/requirements.css">
</head>
<body>

<header class="navbar">

    <a href="index.php" class="logo">
        Task<span>Flow</span>
    </a>

    <nav>
        <a href="index.php">Acasă</a>
        <a href="requirements.php" class="active">
            Cerințe
        </a>
    </nav>

    <span class="version">v<?= e($app->getVersion()) ?></span>

</header>

<main class="container">

    <section class="hero">

        <span class="badge">COMMIT 03 / 20</span>

        <h1>Cerințele proiectului</h1>

        <p>
            Analiza și specificarea aplicației
            TaskFlow - Varianta 15.
        </p>

    </section>

    <section class="stats">

        <article class="stat">
            <span>Cerințe funcționale</span>
            <strong><?= count($functional) ?></strong>
            <small>Funcționalități planificate</small>
        </article>

        <article class="stat">
            <span>Cerințe nefuncționale</span>
            <strong><?= count($technical) ?></strong>
            <small>Standarde tehnice</small>
        </article>

        <article class="stat">
            <span>Roluri</span>
            <strong><?= count($roles) ?></strong>
            <small>Tipuri de utilizatori</small>
        </article>

        <article class="stat">
            <span>Tabele planificate</span>
            <strong><?= count($entities) ?></strong>
            <small>Baza de date</small>
        </article>

    </section>

    <section class="panel">

        <h2>Actorii sistemului</h2>

        <div class="roles">

            <?php foreach ($roles as $role): ?>

                <article class="role">

                    <div class="avatar">
                        <?= e($role['icon']) ?>
                    </div>

                    <h3><?= e($role['name']) ?></h3>

                    <p><?= e($role['description']) ?></p>

                </article>

            <?php endforeach; ?>

        </div>

    </section>

    <div class="columns">

        <section class="panel">

            <h2>Cerințe funcționale</h2>

            <?php foreach ($functional as $code => $name): ?>

                <div class="requirement">

                    <span class="code"><?= e($code) ?></span>

                    <span><?= e($name) ?></span>

                </div>

            <?php endforeach; ?>

        </section>

        <section class="panel">

            <h2>Cerințe nefuncționale</h2>

            <?php foreach ($technical as $code => $name): ?>

                <div class="requirement">

                    <span class="code purple">
                        <?= e($code) ?>
                    </span>

                    <span><?= e($name) ?></span>

                </div>

            <?php endforeach; ?>

        </section>

    </div>

    <section class="panel">

        <h2>Structura bazei de date</h2>

        <p class="muted">
            Entitățile planificate pentru aplicație.
        </p>

        <div class="entities">

            <?php foreach ($entities as $entity): ?>

                <span><?= e($entity) ?></span>

            <?php endforeach; ?>

        </div>

    </section>

    <section class="panel">

        <h2>Componenta interdisciplinară</h2>

        <p class="muted">
            Management - Critical Path Method (CPM)
        </p>

        <div class="formulas">

            <article>
                <small>Finalizare minimă</small>
                <strong>EF = ES + D</strong>
            </article>

            <article>
                <small>Începere maximă</small>
                <strong>LS = LF - D</strong>
            </article>

            <article>
                <small>Rezerva de timp</small>
                <strong>TF = LS - ES</strong>
            </article>

        </div>

        <p class="note">
            Algoritmul CPM va fi implementat
            în următoarea etapă.
        </p>

    </section>

    <section class="progress-panel">

        <div class="progress-title">
            <strong>Etapa proiectului</strong>
            <span>3 / 20</span>
        </div>

        <div class="progress-track">
            <div class="progress-fill"></div>
        </div>

        <p>15% din planul de commit-uri</p>

    </section>

</main>

<footer>

    <?= e(AppConfig::AUTHOR) ?> |
    <?= e(AppConfig::GROUP) ?> |
    Varianta <?= AppConfig::VARIANT ?> |
    PHP <?= e(PHP_VERSION) ?>

</footer>

</body>
</html>