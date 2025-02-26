<?php
// login.php
session_start(); // Toujours en haut !
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prévenir les injections SQL
    $email = mysqli_real_escape_string($conn, $email);

    // Vérifier les informations de l'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Vérification du mot de passe
        if (password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            // ✅ Rediriger vers la bonne page selon le rôle
            if ($user['role'] == 'admin') {
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
            exit(); // Très important !
        }
    }
    echo "Email ou mot de passe incorrect.";
}
$conn->close();
?>
