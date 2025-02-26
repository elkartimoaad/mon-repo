<?php
// filepath: /c:/Users/Dell Latitude/OneDrive/Desktop/location de voiture/logout.php
session_start();
session_destroy();
header("Location: seconnecter.html");
?>