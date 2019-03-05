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
	$fname = $row['fname'];
}
$_SESSION["fname"] = $fname;
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
   echo "<script>alert('account invalid'); window.location.href='index.html'; </script>";
}

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="log.css">
	<title></title>
	<!-- <script type="text/javascript">
		$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
	</script> -->
</head>
<body>
<!-- 	<div class="container"> -->
<div class="login-page">
  <div class="form">
    <form action="log.php" method="POST" align="center">
      <input type="text" placeholder="username" name="email">
      <input type="password" placeholder="password" name="pass" >
      <button name="subl" class="btn btn-dark">Login</button>
      <p class="message">Not registered? <a href="#section3">Create an account</a></p>
    </form>
  </div>
<!-- </div> -->

</div>
</body>
</html>