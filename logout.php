<?php 
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['usetype']);
header("Location:login.php");
?>