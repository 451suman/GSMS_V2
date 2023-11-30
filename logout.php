<?php
session_start();

if (isset($_SESSION['member'])) {
    // Unset the 'member' session variable
    unset($_SESSION['member']);

    session_destroy();

    header("Location: login.php");
    exit;
}
?>