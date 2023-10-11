<?php
// Start or resume the session
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Destroy the session data
session_destroy();

// Redirect the user to the login page after logging out
header("Location: login.php");
exit;
?>
