<?php include 'conn.php'?>
<?php session_start(); ?>
<?php
if(isset($_POST['subl'])){
    $ref=@$_GET['q'];
$var1=$_POST['email'];
$var2=$_POST['pass'];
    $var=base64_encode($var2);
$query="SELECT * FROM `studregister` WHERE pass='$var2' and email='$var1'";
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
//   echo "<script>alert('account invalid') </script>";
//    header('location:new.html#t3');
}

}
 ?>

<!DOCTYPE html>

<html>
<head>
  <title>StudentLogin</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

  <div class="container">
 
<form action="loginn.php" method="POST">
  <div class="container ex1">
    <div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header" style="color: black" >Student Login</div>
  <div class="card-body">
   <div class="form-group ">
    <label for="exampleInputEmail1"style="color: black" >Email ID</label>
    <input type="id" class="form-control" id="exampleInputEmail1"  size='20px' placeholder=" Email ID" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"style="color: black" >Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
    <br>
 
  <button name="subl" class="btn btn-dark">Submit</button>
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
