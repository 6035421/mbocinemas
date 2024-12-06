<?php
session_start();
// Controleer of de gebruiker is ingelogd door te redirecten naar protected_page.php
if (!isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) !== '../templates/protected_page.php') {
    header("Location: ../templates/protected_page.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: ./pages/form.php");
    exit();
}
?>

<title>MBO Cinema's - <?php echo htmlspecialchars(ucfirst(basename($_SERVER['PHP_SELF'], '.php'))); ?></title>

<header>
    <img src='../assets/images/logo.png' alt='logo'>
    <h1 id="title">MBO Cinema's</h1>
    <nav class="login-header">
        <?php if (isset($_SESSION['username'])): ?>
            <p>Welkom, <?= htmlspecialchars($_SESSION['username']); ?></p>
            <a href="?action=logout">Uitloggen</a>
        <?php else: ?>
            <a href="/pages/form.php">Login</a>
        <?php endif; ?>
    </nav>

    <nav class="header-nav">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../pages/nieuwsEnBlog.php">Nieuws en Blog</a></li>
            <li><a href="../pages/agenda.php">Agenda</a></li>
            <li><a href="../pages/reserveren.php">Reserveren</a></li>
            <li><a href="../pages/overons.php">Over ons</a></li>
            <li><a href="../pages/privacy.php">Privacy</a></li>
        </ul>
    </nav>
</header>

<style>
    .header-login {
        display: flex;
        justify-content: flex-end;
        list-style-type: none;
        margin: 0;
        margin-right: 20px;
        padding: 0;
    }
</style>