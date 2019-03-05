<?php include 'conn.php'?>
<?php session_start(); ?>
<?php
if(isset($_POST['subl'])){
    $ref=@$_GET['q'];
$var1=$_POST['email'];
$var2=$_POST['pass'];
    $var=base64_encode($var2);
$query="SELECT * FROM `studregister` WHERE pass='$var' and email='$var1'";
$res=mysqli_query($conn,$query);
    $count=mysqli_num_rows($res);
if($count==1){
while($row = mysqli_fetch_array($res)) {
	$name = $row['name'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $var1;
header("location:uaccount.php?q=1");
}
//    $row = mysqli_fetch_array($res);
//      $var3 = $row['name'];
//    
//if (mysqli_num_rows($res)==1) {
//  $_SESSION['user']=$var3;
//    $_SESSION["emailid"] = $email;
//  header('location:uaccount.php?q=1');
//}
else{
   echo "<script>alert('account invalid') </script>";
    header('location:studentregister.php');
}

}
 ?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>UserLogin</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="userlogin.css">
</head>
<body>
<form method="POST" action="userlogin.php">
	<div class="container ex1">
  <div class="form-group ">
    <label for="exampleInputEmail1">Email ID</label>
    <input type="email" class="form-control" id="exampleInputEmail1" size='20px' placeholder="EmailId" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
  </div>
  <button type="submit" class="btn btn-dark" name="sub">Submit</button>
  </div>
</form>
</body>
</html>-->
