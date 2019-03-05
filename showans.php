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
			<link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
      <link rel="stylesheet" type="text/css" href="style1.css" >
      <link rel="stylesheet" type="text/css" href="marque.css" >
<style type="text/css">
	.btn-outline-info{
	    margin-left: 1250px;
	}
</style>
</head>
<body>
  <div class="topnav" id="myTopnav">
               <div class="topnav1" id="myTopnav"><a href="logout.php">Log Out</a><span id="b"><?php echo "Hello ". $_SESSION['manager']; ?></span></div>
           </div>
            <div class="example5">
                <strong><p>Infidata Exam Portal </p></strong>
</div>
    <div class="topnav" id="myTopnav">
               <div class="topnav1" id="myTopnav"></div>


          <a href="fileupload.php">Upload Documents</a>
          <a href="showans.php">Show Ans</a>     
        <a href="subquest.php">Add Subjective</a>
        <a href="dash.php?q=5">Remove Quiz</a><a href="dash.php?q=4">Add Quiz</a>
        <?php if(@$_GET['q']==2)  ?><a href="dash.php?q=2">Ranking</a>
        <?php if(@$_GET['q']==1)  ?><a href="dash.php?q=1">User</a><a href="teacherreg.php">Teacher Reg</a><a href="teacherdetails.php">Teacher</a>
         <?php if(@$_GET['q']==0) ?><a href="dash.php?q=0">Home</a>
        
           </div><br>
      
    </div>

  <div class="container">
    <form method="post" action="search.php?q=searchquest"><select name="quest"> <?php echo $options; ?> </select><button type="submit" name="sears">Search</button></form><br>
  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">

    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Question</th>
      <th scope="col">Answer</th>
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