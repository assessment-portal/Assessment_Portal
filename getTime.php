<?php
  include 'conn.php';
$eid = $_POST['eid'];
   $resultt = mysqli_query($conn,"SELECT * FROM quiz where eid='$eid'") or die('Error');

while($row = mysqli_fetch_array($resultt)) {
  $time = $row['time'];
    $time1=$time*60;
    
}
echo $time1;
?>