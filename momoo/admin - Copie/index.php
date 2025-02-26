<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: seconnecter.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Your Car</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    
    <h1>Bienvenue sur Your Car</h1>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Vous êtes connecté en tant que <strong><?php echo $_SESSION['user_role']; ?></strong></p>
        <a href="logout.php">Se déconnecter</a>
    <?php else: ?>
        <a href="seconnecter.html">Se connecter</a>
        <a href="sinscrire.html">S'inscrire</a>
    <?php endif; ?>

</body>

</html>
