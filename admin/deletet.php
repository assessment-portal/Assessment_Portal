<?php
require('conn.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM teacherreg WHERE tid=$id"; 
$result = mysqli_query($conn,$query) or die ("error");
header("location: teacherdetails.php"); 
?>