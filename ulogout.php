<?php
session_start();
$un=$_SESSION['user'];
session_destroy();
unset($_SESSION['user']);
header('location:index.html');
?>