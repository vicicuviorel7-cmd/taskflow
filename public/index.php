<?php

declare(strict_types=1);

$modules = [
    ['01', 'Proiecte', 'Organizarea și monitorizarea proiectelor.'],
    ['02', 'Echipe', 'Gestionarea membrilor și responsabilităților.'],
    ['03', 'Kanban', 'Administrarea sarcinilor și progresului.'],
    ['04', 'Pontaj', 'Monitorizarea orelor de lucru.'],
    ['05', 'Drumul critic', 'Calcularea duratei proiectului prin CPM.'],
    ['06', 'Rapoarte', 'Compararea efortului planificat și realizat.']
];

?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Management de proiecte</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="logo">Task<span>Flow</span></div>
    <div class="version">Versiunea 0.1</div>
</header>

<main>
    <section class="hero">
        <span class="badge">PROGRAMARE WEB II</span>

        <h1>Management de proiecte<br>și pontaj</h1>

        <p>
            Organizează proiectele, gestionează echipele
            și monitorizează timpul de lucru.
        </p>

        <a href="#modules" class="button">Descoperă proiectul</a>
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

    <div class="status">
        ● Proiect inițializat cu succes
    </div>
</main>

<footer>
    Vicicu Viorel | IT2501 | Varianta 15 |
    PHP <?= htmlspecialchars(PHP_VERSION) ?>
</footer>

</body>
</html>