<?php
session_start();

// Controleer of de gebruiker is ingelogd
$isLoggedIn = isset($_SESSION['username']);
if ($isLoggedIn) {
        // Stel redirect naar form.php in na 3 seconden
        header("refresh:3;url=../index.php");
} else {
    // Stel redirect naar form.php in na 3 seconden
    header("refresh:3;url=../pages/form.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isLoggedIn ? "Beveiligde Pagina" : "Geen Toegang" ?></title>
</head>

<body>
    <?php if ($isLoggedIn): ?>
        <h1>Welkom op de beveiligde pagina!</h1>
        <p>Je bent succesvol ingelogd als <?= htmlspecialchars($_SESSION['username']); ?>.</p>
        <p>Je wordt binnen enkele seconden doorgestuurd naar de startpagina...</p>
    <?php else: ?>
        <h1>Geen toegang</h1>
        <p>Je moet ingelogd zijn om deze pagina te bekijken.</p>
        <p>Je wordt binnen enkele seconden doorgestuurd naar de startpagina...</p>
    <?php endif; ?>
</body>

</html>