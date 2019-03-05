<?php include'dashboard.php'?>
<?php include'conn.php'?>
<?php session_start(); ?>
<?php 
if(!isset($_SESSION['manager']))
{
    // not logged in
    header('Location: admin.php');
    exit();
}
?>
<?php
//$var=$_SESSION['manager'];
$query="SELECT * FROM `teacherreg`;";
$result=mysqli_query($conn,$query);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>StudentDetails</title>
			   <link  rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="searchbar.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style type="text/css">
	.btn-outline-info{
	    margin-left: 1250px;
	}
</style>
</head>
  <div class="container">
    <br><form method="post" action="search.php?q=searchsubjecteach"><input type="text" name="subsr" placeholder="Search Subject" required/><button type="submit" name="sears"><i class="fa fa-search"></i></button></form>
  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<br>
    <tr><thead>
       <th scope="col"><strong>S.N.</strong></th>
     <th scope="col"><strong>Teacher's Name</strong></th>
      <th scope="col"><strong>Email</strong></th>
      <th scope="col"><strong>Designation</strong></th>
       <th scope="col"><strong>ContactNo.</strong></th>
      <th scope="col"><strong>Bio</strong></th>
      <th scope="col"><strong>Edit</strong></th>
      <th scope="col"><strong>Delete</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $c=1;
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$c++."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['desg']."</td>";
      echo "<td>".$row['contactno']."</td>";
      echo "<td>".$row['bio']."</td>";
      ?>
      <td><a href="edit.php?id=<?php echo $row["tid"]; ?>" class="btn btn-primary">Edit</a></td>
      <td><a href="deletet.php?id=<?php echo $row["tid"]; ?>" class="btn btn-danger">Delete</a></td>
      <?php
    echo "</tr>";
    }
    
    ?>
  </tbody>

</table>
</div>
</div>
</body>
</html>