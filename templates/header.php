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

try {
    $pdo = new PDO('mysql:host=localhost;dbname=mbocinemas', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}
?>

<title>MBO Cinema's - <?php echo htmlspecialchars(ucfirst(basename($_SERVER['PHP_SELF'], '.php'))); ?></title>

<header>
    <img src='../assets/images/logo.png' alt='logo'>
    <h1 id="title">MBO Cinema's</h1>

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

<article id="medewerkerControls"> <!-- hier plaatsen zodat het altijd word toegevoegd -->
    <?php if (isset($_SESSION['username'])): ?>
        <a class="FAB" href="?action=logout">Uitloggen</a>
    <?php else: ?>
        <a class="FAB" href="/pages/form.php">Login</a>
    <?php endif; ?>

    <?php
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rol = null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $userRol = $stmt->fetch(PDO::FETCH_ASSOC);
    $rol = $userRol['rol'];

    if ($rol != 'Klant') { # add, reserveren, edit, edit reservatie and remove etc
        echo '
            <a class="FAB" href="../pages/editReserveringEnInfo.php?type=add">Films Beheeren</a>
            ';
    }
    ?>
</article>