<?php
include '../db/knakworst.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "Registratie geslaagd! <a href='form.php'>Ga terug naar Login</a>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Gebruikersnaam bestaat al. Kies een andere.";
        } else {
            echo "Er is een fout opgetreden: " . $e->getMessage();
        }
    }
}
?>