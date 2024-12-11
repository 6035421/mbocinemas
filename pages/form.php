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

<body>
    <h1>Login</h1>
    <form action="../templates/login.php" method="post" class="login-form">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <button type="submit">Login</button>
    </form>

    <h1>Registreren</h1>
    <form action="../templates/register.php" method="post" class="register-form">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="e-mail" name="mail" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <button type="submit">Registreer</button>
    </form>

    <!-- Home -->
    <h1><a href="../index.php">Home</a></h1>
</body>

</html>