<?php 
include ('conn.php');
session_start(); ?>
<?php
if (isset($_POST['varbutton'])) {
        $_SESSION['manager']=$_POST['varemail'];
    $_SESSION["name"] = 'Admin';
    $_SESSION["email"] = 'admin@admin.com';
    $_SESSION["key"] ='infi123';
	$varemail=$_POST['varemail'];
	$varpassword=$_POST['varpassword'];
	$query="SELECT `userid` FROM `admin` WHERE userid='$varemail' and password='$varpassword'";
	$res=mysqli_query($conn,$query);
	$arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
//	echo $arr["userid"];
	if (mysqli_num_rows($res)==1) {
//  $_SESSION['manager']=$$arr["userid"];
   header("location:dash.php?q=0");     
//  header('location:test.php');
}
else{
  echo "<script>alert('account invalid') </script>";
}

}

?>

<!DOCTYPE html>

<html>
<head>
  <title>adlogin</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

  <div class="container">
 
<form action="admin.php" method="POST">
  <div class="container ex1">
    <div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header" style="color: black" >Admin Login</div>
  <div class="card-body">
   <div class="form-group ">
    <label for="exampleInputEmail1"style="color: black" >User ID</label>
    <input type="id" class="form-control" id="exampleInputEmail1"  size='20px' placeholder=" User ID" name="varemail">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"style="color: black" >Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="varpassword" placeholder="Password">
    <br>
 
  <button name="varbutton" class="btn btn-dark">Submit</button>
  </div>
</div>
</div>
</div>
  
</form>
      <?php
      //$_SESSION['varemail1']=$_POST['varemail'];
      //echo  $_SESSION['varemail1'];     ?>
</body>

</html>
