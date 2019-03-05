<?php 
include ('conn.php');
session_start(); ?>
<?php
if (isset($_POST['subl'])) {
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
   header("location:dash.php?q=1");     
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
	<link rel="stylesheet" type="text/css" href="admin.css">
	<title>Admin InfiData</title>
	<style type="text/css">
		.container{
			float: center;
			margin-top: 30px;
			padding-top: 40px;
		}
	</style>
</head>
<body>
	<div class="container">
<div class="login-page">
  <div class="form">
    <form action="admin.php" method="POST" align="center">
      <input type="text" placeholder="Email" name="varemail">
      <input type="password" placeholder="Password" name="varpassword" >
      <button name="subl" class="btn btn-dark">Login</button>
    </form>
  </div>
</div>

</div>
</body>
</html>