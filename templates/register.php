<?php
include '../db/knakworst.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = trim($_POST['mail']);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->execute(['username' => $username, 'password' => $password , 'email' => $email]);
        echo "Registratie geslaagd! <a href='../index.php'>Ga terug naar Login</a>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Gebruikersnaam bestaat al. Kies een andere.";
        } else {
            echo "Er is een fout opgetreden: " . $e->getMessage();
        }
    }
}
?>