<?php
require('conn.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM studregister WHERE sid=$id"; 
$result = mysqli_query($conn,$query) or die ("error");
header("location: dash.php?q=1"); 
?>