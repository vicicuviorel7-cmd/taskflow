<?php

declare(strict_types=1);

use TaskFlow\Config\AppConfig;

$app = require dirname(__DIR__) . '/bootstrap.php';

$modules = $app->getModules();
$environment = $app->getEnvironment();

?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TaskFlow - Management de proiecte</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="logo">Task<span>Flow</span></div>

    <div class="version">
        Versiunea <?= htmlspecialchars($app->getVersion()) ?>
    </div>
</header>

<main>

    <section class="hero">
        <span class="badge">PROGRAMARE WEB II</span>

        <h1>Management de proiecte<br>și pontaj</h1>

        <p>
            Organizează proiectele, gestionează echipele
            și monitorizează timpul de lucru.
        </p>

        <div class="hero-buttons">

    <a href="#modules" class="button">
        Descoperă proiectul
    </a>

    <a href="requirements.php"
       class="button secondary-button">
        Cerințele proiectului
    </a>

</div>
    </section>

    <section class="cards" id="modules">

        <?php foreach ($modules as $module): ?>

            <article class="card">

                <span class="number">
                    <?= htmlspecialchars($module[0]) ?>
                </span>

                <h2><?= htmlspecialchars($module[1]) ?></h2>

                <p><?= htmlspecialchars($module[2]) ?></p>

            </article>

        <?php endforeach; ?>

    </section>

    <section class="environment">

        <h2>Mediul de dezvoltare</h2>

        <p>Configurarea tehnică a aplicației</p>

        <div class="environment-grid">

            <article class="environment-card">
                <p>Versiunea PHP</p>
                <h3><?= htmlspecialchars($environment['php']) ?></h3>

                <span class="<?= $environment['compatible']
                    ? 'success' : 'warning' ?>">

                    <?= $environment['compatible']
                        ? 'Compatibil' : 'Incompatibil' ?>
                </span>
            </article>

            <article class="environment-card">
                <p>Composer</p>
                <h3><?= $environment['composer']
                    ? 'Activ' : 'Inactiv' ?></h3>
                <span class="success">Autoloader</span>
            </article>

            <article class="environment-card">
                <p>Standard PSR-4</p>
                <h3><?= $environment['psr4']
                    ? 'Activ' : 'Inactiv' ?></h3>
                <span class="success">Autoîncărcare clase</span>
            </article>

            <article class="environment-card">
                <p>Etapa proiectului</p>
                <h3>3 / 20</h3>
<span class="success">Analiză și specificare</span>
            </article>

        </div>

    </section>

    <div class="status">

        <?php if (
            $environment['compatible']
            && $environment['composer']
            && $environment['psr4']
        ): ?>

            ● Mediul de dezvoltare este configurat corect

        <?php else: ?>

            Verifică mediul de dezvoltare.

        <?php endif; ?>

    </div>

</main>

<footer>
    <?= htmlspecialchars(AppConfig::AUTHOR) ?> |
    <?= htmlspecialchars(AppConfig::GROUP) ?> |
    Varianta <?= AppConfig::VARIANT ?> |
    PHP <?= htmlspecialchars(PHP_VERSION) ?>
</footer>

</body>
</html>
