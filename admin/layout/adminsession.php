<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header("location:login.php");
}
$row=$_SESSION['admin'];
$aid=$row['aid'];
$an=$row['name'];
$ae=$row['email'];
$ap=$row['phone'];
?>