<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    $stmt = $pdo->prepare("INSERT INTO children (name, age, grade) VALUES (?, ?, ?)");
    $stmt->execute([$name, $age, $grade]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Enfant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un Enfant</h1>
    <form method="POST">
        <label>Nom: <input type="text" name="name" required></label><br>
        <label>Âge: <input type="number" name="age" required></label><br>
        <label>Classe: <input type="text" name="grade" required></label><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>