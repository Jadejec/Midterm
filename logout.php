<?php
session_start();

// Destroy the session to log the user out
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page (adjust 'index.php' if your login page is named differently)
header("Location: index.php");
exit();
?>