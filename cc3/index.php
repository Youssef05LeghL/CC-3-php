<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM children");
$children = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Enfants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Enfants</h1>
    <a href="create.php">Ajouter un Enfant</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Âge</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($children as $child): ?>
        <tr>
            <td><?php echo htmlspecialchars($child['name']); ?></td>
            <td><?php echo htmlspecialchars($child['age']); ?></td>
            <td><?php echo htmlspecialchars($child['grade']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $child['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $child['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>