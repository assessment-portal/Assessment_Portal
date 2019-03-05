<?php
include("conn.php");
session_start(); 
$id=$_REQUEST['id'];
$query = "SELECT * from studregister where sid='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
           #ui{
        background-color: #ffffff;
        padding: 30px 50px 50px 50px;
        margin-top: 10px;
        border-radius: 25px;
        opacity: 1;
        
    }
   	#back{
    	float: right;
    	margin: -100px 20px;
    }
    #back a{
    	color: #ffffff;
    }
    .container{
    	border-radius: 25px;
    }
   .container input{
     background-color: #f2f2f2;
     width: 250px;
   }
     label{
        color: black;
        font-family: serif;
        font-size: 22px;
    }

    #p{
    
        margin-top: 10px;
        margin-left: 150px;
        font-size: 40px;
        color:  #193059;
        font-weight: bold;
}
    .container{
        float: center;
        margin-top: 130px;
         width: 600px;
  height: 400px;
  
  border: 1px solid #193059;

    }
 .form-group button
 {
    background-color:#cd6f0d;
    color: white;
 }
 .form-control{
    background-color:#f2f2f2;
 }

      </style>
</head>
<body>
	<a href="dash.php?q=1" class="btn btn-primary" id="back">Back</a>
<div class="form">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$email =$_REQUEST['email'];
$subject =$_REQUEST['subject'];
$contactno=$_REQUEST['contactno'];
$address =$_REQUEST['address'];
// $submittedby = $_SESSION["manager"];
// $update="update teacherreg set 
// name='".$name."', email='".$email."',desg='".$desg."',contactno='".$contactno."',
// bio='".$bio."' where tid='".$id."'";
$update="UPDATE studregister SET fname='$fname',lname='$lname',email='$email',subject='$subject',contactno='$contactno',address='$address' WHERE sid='$id'";
$res=mysqli_query($conn, $update) or die("error");
header("location:dash.php?q=1");

}else {
?>
<div class="container">
	<p id="p">Update Record</p>
<form name="form" class="form-group" method="post" action=""> 
	<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['sid'];?>" />
	<div class="row">
      <div class="col-lg-6">
	     <label>First Name</label>
      </div>
      <div class="col-lg-6">
<input type="text" name="fname" placeholder="Enter First Name" 
required value="<?php echo $row['fname'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Last Name</label>
      </div>
       <div class="col-lg-6">
    <input type="text" name="lname" placeholder="Enter Last Name" 
required value="<?php echo $row['lname'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Email</label>
      </div>
       <div class="col-lg-6">
       	<input type="email" name="email" placeholder="Enter Email" 
required value="<?php echo $row['email'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Subject</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="subject" placeholder="Enter Subject" 
required value="<?php echo $row['subject'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Contact</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="contactno" placeholder="Enter ContactNo" 
required value="<?php echo $row['contactno'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Address</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="address" placeholder="Enter Address" 
required value="<?php echo $row['address'];?>" />
</div>
</div>
<br><br>
	         <button id="send" value="Update" type="submit" name="submit" class="btn btn-block btn-lg">Update</button>
</form>
<?php } ?>

</div>
      <!-- <input name="submit" type="submit" value="Update" /> -->
  </div>
</body>
</html>