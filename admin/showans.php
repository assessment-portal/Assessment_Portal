<?php include('dashboard.php')?>
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
    $qt="SELECT * FROM subques";
    $rest= mysqli_query($conn,$qt);
    $options="";
   while($row2 = mysqli_fetch_array($rest)) {
       $options=$options."<option>$row2[quest]</option>";
//       $name = $row2['name'];
//       echo $name;
   }
  ?>
<?php
//$var=$_SESSION['manager'];
$query="SELECT * FROM `subansw`;";
$result=mysqli_query($conn,$query);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>StudentDetails</title>
			  <link  rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="searchbar.css">
    <!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	.btn-outline-info{
	    margin-left: 1250px;
	}
  .topnav select{
    padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

</style>
</head>
<body>
 
<br>
<!-- <div class="topnav"><div class="search-container" id="left"><form method="post" action="search.php?q=searchsubject"><input type="text" name="subsr" placeholder="Search Subject" required/><button type="submit" name="sears"><i class="fa fa-search"></i></button></form></div> -->
  <div class="container">
    <div class="topnav"><div class="search-container" id="left">
     <form method="post" action="search.php?q=searchquest"><select name="quest" id="sel"> <?php echo $options; ?> </select><button type="submit" name="sears"><i class="fa fa-search"></i></button></form></div></div>
  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">

    <tr>
      <th scope="col"><b>Fname</b></th>
      <th scope="col"><b>Question</b></th>
      <th scope="col"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer</b></th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row['user']."</td>";
      echo "<td>".$row['quest']."</td>";
      echo "<td>".$row['ans']."</td>";
      echo "</tr>";
    }
    
    ?>
  </tbody>

</table>
</div>
</div>
</body>
</html>