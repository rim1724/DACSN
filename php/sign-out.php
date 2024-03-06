<?php

session_start(); // Start session if not already started

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../views/index-main.php");
exit;

?>
