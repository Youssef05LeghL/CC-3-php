<?php
$host = 'localhost';
$port = 3306;
$db = 'sortie';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo("Could not connect to the database $db :" . $e->getMessage());
}
?>