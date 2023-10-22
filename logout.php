<?php
session_start();

// Check if the 'member' session variable is set
if(isset($_SESSION['member']))
{
    // Unset the 'member' session variable
    unset($_SESSION['member']);
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or any other page you want
    header("Location: login.php");
    exit;
}
?>
