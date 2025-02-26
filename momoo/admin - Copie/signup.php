<?php
// signup.php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = "client"; // ✅ Forcer le rôle pour éviter des inscriptions "admin" frauduleuses

    // Vérifier si l'utilisateur existe déjà
    $sql = "SELECT * FROM utilisateurs WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Cet email est déjà utilisé.";
    } else {
        // Insérer le nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (email, mot_de_passe, role) VALUES ('$email', '$password', '$role')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_role'] = $role;

            // ✅ Connecter directement après l'inscription
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur: " . $conn->error;
        }
    }
}
$conn->close();
?>
