<?php
include '../db/knakworst.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $id = null;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];

            echo "Login geslaagd! <a href='../templates/protected_page.php'>Ga naar beveiligde pagina</a>";
        } else {
            echo "Onjuiste gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        echo "Er is een fout opgetreden: " . $e->getMessage();
    }
}
?>