<?php
// filepath: /c:/Users/Dell Latitude/OneDrive/Desktop/location de voiture/admin/gestion_vehicules.php
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
    <title>Gérer les véhicules - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Gérer les véhicules</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Catégorie</th>
                <th>Prix par jour</th>
                <th>Disponibilité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM vehicules";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['marque']}</td>
                        <td>{$row['modele']}</td>
                        <td>{$row['categorie']}</td>
                        <td>{$row['prix_par_jour']}</td>
                        <td>{$row['disponibilite']}</td>
                        <td>
                            <a href='modifier_vehicule.php?id={$row['id']}'>Modifier</a>
                            <a href='supprimer_vehicule.php?id={$row['id']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>