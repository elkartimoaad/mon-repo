<?php
// filepath: /c:/Users/Dell Latitude/OneDrive/Desktop/location de voiture/admin/gestion_support.php
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
    <title>Gérer le support client - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Gérer le support client</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur ID</th>
                <th>Sujet</th>
                <th>Message</th>
                <th>Statut</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM support_client";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['utilisateur_id']}</td>
                        <td>{$row['sujet']}</td>
                        <td>{$row['message']}</td>
                        <td>{$row['statut']}</td>
                        <td>{$row['date_creation']}</td>
                        <td>
                            <a href='modifier_support.php?id={$row['id']}'>Modifier</a>
                            <a href='supprimer_support.php?id={$row['id']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>