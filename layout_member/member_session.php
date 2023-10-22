<?php
session_start();
if(!isset($_SESSION['member']))
{
    header("location:login.php");
}
$row=$_SESSION['member'];
$id=$row['mid'];
$n=$row['name'];
$e=$row['email'];
$p=$row['phone'];
$image=$row['image'];
$status=$row['status'];


?>