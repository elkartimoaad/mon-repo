<?php
// filepath: /c:/Users/Dell Latitude/OneDrive/Desktop/location de voiture/admin/gestion_utilisateurs.php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: ../seconnecter.html");
    exit();
}
include '../db.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les utilisateurs - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Gérer les utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM utilisateurs";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['date_creation']}</td>
                        <td>
                            <a href='modifier_utilisateur.php?id={$row['id']}'>Modifier</a>
                            <a href='supprimer_utilisateur.php?id={$row['id']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>