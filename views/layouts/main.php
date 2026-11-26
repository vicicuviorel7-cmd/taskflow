<?php

declare(strict_types=1);

$title = $title ?? 'TaskFlow - Dashboard';
$view = $view ?? __DIR__ . '/../dashboard/index.php';

?>

<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title) ?></title>

    <link rel="stylesheet" href="/assets/css/dashboard.css">

</head>

<body>

    <div class="app">

        <?php require __DIR__ . '/../partials/sidebar.php'; ?>

        <div class="main">

            <?php require __DIR__ . '/../partials/header.php'; ?>

            <main class="content">

                <?php require $view; ?>

            </main>

            <footer class="footer">
                © <?= date('Y') ?> TaskFlow — Vicicu Viorel
            </footer>

        </div>

    </div>

</body>

</html>
