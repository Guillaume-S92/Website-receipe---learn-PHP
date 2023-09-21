<?php
session_start();
session_unset();
session_destroy();
setcookie('LOGGED_USER', '', time() - 3600); // Supprime le cookie

// Redirige l'utilisateur vers la page d'accueil après la déconnexion
header('Location: home.php');
exit;
?>