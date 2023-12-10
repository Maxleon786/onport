<?php session_start(); ?>
<?php 
session_destroy();
header("location:admin_login.php");
?>