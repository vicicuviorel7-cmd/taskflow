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

    <script>
        try {
            if (localStorage.getItem('taskflow-theme') === 'dark') {
                document.documentElement.dataset.theme = 'dark';
            }
        } catch (error) {
            // Tema implicită rămâne activă.
        }
    </script>

    <link rel="stylesheet" href="/assets/css/dashboard.css">

    <link rel="stylesheet" href="/assets/css/responsive.css">

    <script src="/assets/js/dashboard.js" defer></script>

</head>

<body>

    <div class="app">

        <?php require __DIR__ . '/../partials/sidebar.php'; ?>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="main" id="mainArea">

            <?php require __DIR__ . '/../partials/header.php'; ?>

            <main class="content">

                <?php require $view; ?>

            </main>

            <footer class="footer">

                © <?= date('Y') ?> TaskFlow — Vicicu Viorel

                <span> | Programare Web II</span>

            </footer>

        </div>

    </div>

</body>

</html>
