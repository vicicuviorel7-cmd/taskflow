<?php

declare(strict_types=1);

$statistics = [
    ['title' => 'Proiecte active', 'value' => '04', 'color' => 'purple'],
    ['title' => 'Sarcini totale', 'value' => '24', 'color' => 'blue'],
    ['title' => 'Sarcini finalizate', 'value' => '16', 'color' => 'green'],
    ['title' => 'Ore lucrate', 'value' => '48', 'color' => 'orange']
];

$projects = [
    [
        'name' => 'TaskFlow Web',
        'status' => 'În lucru',
        'progress' => 65,
        'class' => 'working'
    ],
    [
        'name' => 'Platformă educațională',
        'status' => 'Finalizat',
        'progress' => 100,
        'class' => 'completed'
    ],
    [
        'name' => 'Aplicație mobilă',
        'status' => 'Planificat',
        'progress' => 25,
        'class' => 'planned'
    ]
];

?>

<section class="welcome">
    <h1>Bine ai venit!</h1>
    <p>Gestionează proiectele și activitatea echipei tale.</p>
    <small>Date demonstrative</small>
</section>

<section class="statistics">

    <?php foreach ($statistics as $item): ?>

        <article class="stat-card">

            <div class="indicator <?= $item['color'] ?>"></div>

            <p><?= htmlspecialchars($item['title']) ?></p>

            <h2><?= htmlspecialchars($item['value']) ?></h2>

        </article>

    <?php endforeach; ?>

</section>

<section class="panel">

    <h2>Proiecte recente</h2>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>Proiect</th>
                    <th>Stare</th>
                    <th>Progres</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($projects as $project): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($project['name']) ?>
                        </td>

                        <td>
                            <span class="status <?= $project['class'] ?>">
                                <?= htmlspecialchars($project['status']) ?>
                            </span>
                        </td>

                        <td>
                            <div class="progress-container">

                                <div class="progress">
                                    <div style="width: <?= (int) $project['progress'] ?>%"></div>
                                </div>

                                <span>
                                    <?= (int) $project['progress'] ?>%
                                </span>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</section>
