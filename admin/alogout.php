<?php
session_start();

// Check if the 'member' session variable is set
if (isset($_SESSION['admin'])) {
    // Unset the 'member' session variable
    unset($_SESSION['admin']);

    session_destroy();

    header("Location: login.php");
    exit;
}
?>