<?php
session_start();
$un=$_SESSION['ses'];
session_destroy();
unset($_SESSION['ses']);
header('location:admin.php');
?>