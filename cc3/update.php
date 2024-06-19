
<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM children WHERE id = ?");
$stmt->execute([$id]);
$child = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    $stmt = $pdo->prepare("UPDATE children SET name = ?, age = ?, grade = ? WHERE id = ?");
    $stmt->execute([$name, $age, $grade, $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Enfant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier un Enfant</h1>
    <form method="POST">
        <label>Nom: <input type="text" name="name" value="<?php echo htmlspecialchars($child['name']); ?>" required></label><br>
        <label>Âge: <input type="number" name="age" value="<?php echo htmlspecialchars($child['age']); ?>" required></label><br>
        <label>Classe: <input type="text" name="grade" value="<?php echo htmlspecialchars($child['grade']); ?>" required></label><br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>