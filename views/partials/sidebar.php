<?php declare(strict_types=1); ?>

<aside class="sidebar" id="sidebar">

    <div class="sidebar-top">

        <div class="logo">

            <span class="logo-icon">✓</span>

            TaskFlow

        </div>

        <button
            type="button"
            class="close-menu"
            id="closeMenu"
            aria-label="Închide meniul"
        >
            ×
        </button>

    </div>

    <p class="menu-title">MENIU PRINCIPAL</p>

    <nav aria-label="Meniu principal">

        <a href="/" class="active" aria-current="page">
            <span class="nav-icon">▦</span>
            Dashboard
        </a>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">▣</span>
            Proiecte
        </span>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">♟</span>
            Echipe
        </span>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">☷</span>
            Sarcini Kanban
        </span>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">◷</span>
            Pontaj
        </span>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">▥</span>
            Rapoarte
        </span>

        <span class="nav-disabled" aria-disabled="true">
            <span class="nav-icon">⚙</span>
            Setări
        </span>

    </nav>

    <p class="menu-title secondary-menu-title">
        INFORMAȚII
    </p>

    <nav aria-label="Informații proiect">

        <a href="/requirements.php">

            <span class="nav-icon">▤</span>

            Cerințele proiectului

        </a>

    </nav>

    <div class="sidebar-footer">

        <strong>TaskFlow v1.0</strong>

        <small>Programare Web II</small>

        <small>Grupa IT2501</small>

    </div>

</aside>
