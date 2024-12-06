<?php
// $host = 'localhost';
// $dbname = 'mbocinemas';
// $username = 'root';
// $password = '';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=mbocinemas', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}
?>