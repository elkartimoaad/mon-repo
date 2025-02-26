<?php
// filepath: /c:/Users/Dell Latitude/OneDrive/Desktop/location de voiture/admin/gestion_reservations.php
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
    <title>Gérer les réservations - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <h1>Gérer les réservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur ID</th>
                <th>Véhicule ID</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Statut</th>
                <th>Paiement statut</th>
                <th>Total</th>
                <th>Date réservation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM reservations";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['utilisateur_id']}</td>
                        <td>{$row['vehicule_id']}</td>
                        <td>{$row['date_debut']}</td>
                        <td>{$row['date_fin']}</td>
                        <td>{$row['statut']}</td>
                        <td>{$row['paiement_statut']}</td>
                        <td>{$row['total']}</td>
                        <td>{$row['date_reservation']}</td>
                        <td>
                            <a href='modifier_reservation.php?id={$row['id']}'>Modifier</a>
                            <a href='supprimer_reservation.php?id={$row['id']}'>Supprimer</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>