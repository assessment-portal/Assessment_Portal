<html>
<head>
<title>DASHBOARD</title>
    <link  rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="marque.css">
    <link rel="stylesheet" type="text/css" href="style1.css">

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<br><br><br>
<body  style="background:#eee;">
           <script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<div class="header">
<div class="row">
<div class="col-lg-6">

<?php
include 'dashboard.php';
 include_once 'conn.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:studentregister.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'conn.php';

}?>

</div></div>
<!-- admin start-->
  <!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<?php 
include 'conn.php';
$email=$_SESSION['email'];

if(isset($_SESSION['key'])){
if(@$_GET['q']== 'searchsubject' && $_SESSION['key']=='infi123') {
	$subsr=$_POST['subsr'];
$result = mysqli_query($conn,"SELECT * FROM studregister WHERE subject='$subsr'") or die('Error');
echo  '<br><div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Fname</b></td><td><b>Lname</b></td><td><b>Gender</b></td><td><b>Email</b></td><td><b>Subject</b></td><td><b>ContactNo.</b></td><td><b>Address</b></td><td><b>Teacher</b></td><td><b>Edit</b></td><td><b>Delete</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['fname'];
  $name1 = $row['lname'];
  $sex=$row['Gender'];
	$email = $row['email'];
	$subject = $row['subject'];
    $contactno = $row['contactno'];
	$address = $row['address'];
    $teacher = $row['teacher'];
	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$name1.'</td><td>'.$sex.'</td><td>'.$email.'</td><td>'.$subject.'</td><td>'.$contactno.'</td><td>'.$address.'</td><td>'.$teacher.'</td>
	<td><a href="edits.php?id='.$row["sid"].'" class="btn btn-primary">Edit</a></td>
        <td><a href="deletes.php?id='.$row["sid"].'" class="btn btn-danger">Delete</a></td>';
}
$c=0;
echo '</table></div></div>';
}
}
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'searchteacher' && $_SESSION['key']=='infi123') {
	$tachsr=$_POST['tachsr'];
$result = mysqli_query($conn,"SELECT * FROM studregister WHERE teacher='$tachsr'") or die('Error');
echo  '<br><div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Fname</b></td><td><b>Lname</b></td><td><b>Gender</b></td><td><b>Email</b></td><td><b>Subject</b></td><td><b>ContactNo.</b></td><td><b>Address</b></td><td><b>Teacher</b></td><td><b>Edit</b></td><td><b>Delete</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['fname'];
  $name1 = $row['lname'];
  $sex=$row['Gender'];
	$email = $row['email'];
	$subject = $row['subject'];
    $contactno = $row['contactno'];
	$address = $row['address'];
    $teacher = $row['teacher'];
	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$name1.'</td><td>'.$sex.'</td><td>'.$email.'</td><td>'.$subject.'</td><td>'.$contactno.'</td><td>'.$address.'</td><td>'.$teacher.'</td>
	<td><a href="edits.php?id='.$row["sid"].'" class="btn btn-primary">Edit</a></td>
        <td><a href="deletes.php?id='.$row["sid"].'" class="btn btn-danger">Delete</a></td>';
}
$c=0;
echo '</table></div></div>';
}
}
?>
<?php
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'searchsubjecteach' && $_SESSION['key']=='infi123') {
  $subsr=$_POST['subsr'];
$result = mysqli_query($conn,"SELECT * FROM teacherreg WHERE desg='$subsr'") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Designation</b></td><td><b>ContactNo.</b></td><td><b>Bio</b><td><b>Edit</b></td><td><b>Delete</b></td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $email = $row['email'];
  $desg = $row['desg'];
    $contactno = $row['contactno'];
  $bio = $row['bio'];
    
  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$desg.'</td><td>'.$contactno.'</td><td>'.$bio.'</td> <td><a href="edit.php?id='.$row["tid"].'" class="btn btn-primary">Edit</a></td>
      <td><a href="deletet.php?id='.$row["tid"].'" class="btn btn-danger">Delete</a></td>';
}
$c=0;
echo '</table></div></div>';
}
}
?>
<?php
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'searchquest' && $_SESSION['key']=='infi123') {
  $quest=$_POST['quest'];
$result = mysqli_query($conn,"SELECT * FROM subansw WHERE quest='$quest'") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Student Name</b></td><td><b>Question</b></td><td><b>Answer</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $user = $row['user'];
  $quest = $row['quest'];
  $ans = $row['ans'];
    
  echo '<tr><td>'.$c++.'</td><td>'.$user.'</td><td>'.$quest.'</td><td>'.$ans.'</td><td>';
}
$c=0;
echo '</table></div></div>';
}
}
?>
</div>
</div>
</div>
</body>
</html>