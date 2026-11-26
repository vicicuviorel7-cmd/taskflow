document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    const menuToggle = document.getElementById("menuToggle");
    const closeMenu = document.getElementById("closeMenu");
    const overlay = document.getElementById("sidebarOverlay");
    const themeToggle = document.getElementById("themeToggle");
    const mainArea = document.getElementById("mainArea");

    const mobileScreen = window.matchMedia("(max-width: 768px)");

    // Deschiderea meniului lateral

    function openSidebar() {

        if (!mobileScreen.matches) return;

        sidebar.classList.add("open");
        overlay.classList.add("visible");
        document.body.classList.add("menu-open");

        sidebar.inert = false;
        mainArea.inert = true;

        menuToggle.setAttribute("aria-expanded", "true");

        closeMenu.focus();
    }

    // Închiderea meniului lateral

    function closeSidebar(restoreFocus = true) {

        sidebar.classList.remove("open");
        overlay.classList.remove("visible");
        document.body.classList.remove("menu-open");

        mainArea.inert = false;
        sidebar.inert = mobileScreen.matches;

        menuToggle.setAttribute("aria-expanded", "false");

        if (restoreFocus && mobileScreen.matches) {
            menuToggle.focus();
        }
    }

    menuToggle.addEventListener("click", openSidebar);

    closeMenu.addEventListener("click", function () {
        closeSidebar();
    });

    overlay.addEventListener("click", function () {
        closeSidebar();
    });

    document.addEventListener("keydown", function (event) {

        if (
            event.key === "Escape" &&
            sidebar.classList.contains("open")
        ) {
            closeSidebar();
        }

    });

    mobileScreen.addEventListener("change", function () {
        closeSidebar(false);
    });

    closeSidebar(false);

    // Dark Mode și Light Mode

    function applyTheme(theme) {

        const darkMode = theme === "dark";

        document.documentElement.dataset.theme =
            darkMode ? "dark" : "light";

        themeToggle.textContent = darkMode ? "☀" : "☾";

        themeToggle.setAttribute(
            "aria-label",
            darkMode
                ? "Activează modul luminos"
                : "Activează modul întunecat"
        );

        themeToggle.setAttribute(
            "aria-pressed",
            String(darkMode)
        );
    }

    let savedTheme = "light";

    try {

        savedTheme =
            localStorage.getItem("taskflow-theme") || "light";

    } catch (error) {

        console.warn("Tema nu poate fi citită.");

    }

    applyTheme(savedTheme);

    themeToggle.addEventListener("click", function () {

        const currentTheme =
            document.documentElement.dataset.theme;

        const newTheme =
            currentTheme === "dark" ? "light" : "dark";

        applyTheme(newTheme);

        try {

            localStorage.setItem("taskflow-theme", newTheme);

        } catch (error) {

            console.warn("Tema nu poate fi salvată.");

        }

    });

    console.log("TaskFlow - Commit 5 încărcat corect.");

});
