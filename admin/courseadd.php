<?php include'conn.php';
      include 'dashboard.php';
?>
<?php session_start(); ?>
<?php 
//$varid=$_SESSION['manager'];
if (isset($_POST['submit'])) {
$desg=$_POST['desg'];
$query="INSERT INTO `courses` ( `desg`) VALUES ('$desg')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Course added successfully.') </script>";
} else{
        echo "<script>alert('ERROR: Could not able to execute') </script>";
}
 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
            <link  rel="stylesheet" href="bootstrap.min.css"/>
               <link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <style type="text/css">
           
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
   .container input,select{
     background-color: #f2f2f2;
     width: 270px;

     padding-top:10px;
     margin-top: 6px;
   }
     label{
        color: black;
        font-family: serif;
        font-size: 22px;
    }

    #p{
    
        margin-top: 10px;
        margin-left: 180px;
        font-size: 40px;
        color:  #193059;
        font-weight: bold;
}
    .container{
        float: center;
        margin-top: 130px;
         width: 600px;
  height: 250px;
  
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
/* #area{
  height: 80px;
 }
 #area input{
  text-align: justify;
 }*/

            </style>
</head>
<body>
<div class="container">
  <p id="p">Add Course</p><br>
<form class="form-group" method="POST" action="courseadd.php"> 
  <div class="row">
      <div class="col-lg-6">
       <label>Course</label>
      </div>
      <div class="col-lg-6">
    <input type="text" name="desg" class="form-control" placeholder="Enter Course" required />
</div>
</div>
<br><br>
           <button id="send" value="Update" type="submit" name="submit" class="btn btn-block btn-lg">Submit</button>
</form>
</body>
</html>