<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Kijk de nieuwste film bij MBO Cinema's">
    <meta name="keywords" content="Films, series, bioscoop">
    <meta name="author" content="Quinten, Luke">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png">

    <title>MBO Cinema's - <?php echo htmlspecialchars(ucfirst(basename($_SERVER['PHP_SELF'], '.php'))); ?></title>>
</head>

<header>
    <img src='../assets/images/logo.png' alt='logo'>
    <h1 id="title">MBO Cinema's</h1>
</header>

<body id="loginBody">
    <main>
        <h1>Login</h1>
        <form action="../templates/login.php" method="post" class="login-form">
            <input id="loginUsername" type="text" name="username" placeholder="Gebruikersnaam" required>
            <input id="loginPassword" type="password" name="password" placeholder="Wachtwoord" required>
            <button type="submit">Login</button>
        </form>

        <h1>Registreren</h1>
        <form action="../templates/register.php" method="post" class="register-form">
            <input id="registerUsername" type="text" name="username" placeholder="Gebruikersnaam" required>
            <input id="registerMail" type="e-mail" name="mail" placeholder="E-mail" required>
            <input id="registerPassword" type="password" name="password" placeholder="Wachtwoord" required>
            <button type="submit">Registreer</button>
        </form>
    </main>

    <script src="../js/formStoring.js"></script>
</body>

</html>