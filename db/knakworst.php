<?php
// $host = 'localhost';
// $dbname = 'mbocinemas';
// $username = 'root';
// $password = '';

try {
    $dsn = 'mysql:host=localhost;dbname=mbocinemas';
    $username = 'root';
    $password = '';
    
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}
?>