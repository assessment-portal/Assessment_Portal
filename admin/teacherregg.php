<?php include'conn.php';
include'dashboard.php'; ?>
<?php session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:admin.php");

}
?>
<?php 
if(!isset($_SESSION['manager']))
{
    // not logged in
    header('Location: admin.php');
    exit();
}
?>
<?php 
//$varid=$_SESSION['manager'];
if (isset($_POST['sub'])) {
$var1=$_POST['field1'];
$var2=$_POST['field2'];
$var3=$_POST['field3'];
$var4=$_POST['field4'];
$var5=$_POST['field5'];
$query="INSERT INTO `teacherreg` ( `name`, `email`,`desg`, `contactno`, `bio`) VALUES ('$var1','$var2','$var3','$var4','$var5')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Records added successfully.') </script>";
} else{
        echo "<script>alert('ERROR: Could not able to execute') </script>";
}
 
}
?>
<?php 
//$varid=$_SESSION['manager'];
if (isset($_POST['submit'])) {
$desg=$_POST['desg'];
$query="INSERT INTO `courses` ( `desg`) VALUES ('$desg')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Records added successfully.') </script>";
} else{
        echo "<script>alert('ERROR: Could not able to execute') </script>";
}
 
}
?>
<?php
    $qt="SELECT * FROM courses";
    $rest= mysqli_query($conn,$qt);
    $options="";
   while($row2 = mysqli_fetch_array($rest)) {
       $options=$options."<option>$row2[desg]</option>";
//       $name = $row2['name'];
//       echo $name;
   }
  ?>

<html>
    <head>
            <<!-- link rel="stylesheet" type="text/css" href="style1.css">
            <link rel="stylesheet" type="text/css" href="marque.css">
        <link rel="stylesheet" type="text/css" href="studentregister.css"> -->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
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
        margin-left: 100px;
        font-size: 40px;
        color:  #193059;
        font-weight: bold;
}
    .container{
        float: center;
        margin-top: 70px;
         width: 600px;
  height: 390px;
  
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
 <script type="text/javascript">

function valid()                                    
{ 
    var name = document.forms["RegForm"]["field1"];               
    var email = document.forms["RegForm"]["field2"];    
    var phone = document.forms["RegForm"]["field4"];  

    // var password = document.forms["RegForm"]["pass"]; 
    // var cpassword = document.forms["RegForm"]["repass"];   
    var bio = document.forms["RegForm"]["field5"];  
   
    if (name.value == "")                                  
    { 
        window.alert("Please enter your first name."); 
        name.focus(); 
        return false; 
    } 
   
    if (bio.value == "")                               
    { 
        window.alert("Please enter your address."); 
        name.focus(); 
        return false; 
    } 
       
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (phone.value == "")                           
    { 
        window.alert("Please enter your phone number."); 
        phone.focus(); 
        return false; 
    } 
    if (what.selectedIndex < 1)                  
    { 
        alert("Please enter your course."); 
        what.focus(); 
        return false; 
    } 
   
    return true; 
}


</script>
            <script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
        
    </head>
    <body>
    	
    

<div class="container">
	<p id="p">Teacher Registration</p>
<form class="form-group" method="POST" name="RegForm" action="teacherregg.php" onSubmit="return valid()"> 
	<div class="row">
      <div class="col-lg-6">
	     <label>Name</label>
      </div>
      <div class="col-lg-6">
    <input type="text" name="field1" class="form-control" placeholder="Full Name" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Email</label>
      </div>
       <div class="col-lg-6">
       	<input type="email" name="field2" class="form-control" placeholder="Email" />
       	</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Designation</label>
      </div>
       <div class="col-lg-6">
       	       <select name="field3"class="form-control" > <?php echo $options; ?> </select>
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Contact</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="field4" class="form-control" placeholder="ContactNo." pattern="[6-9]{1}[0-9]{9}" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Bio</label>
      </div>
       <div class="col-lg-6">
       <input type="textarea" id="area" class="form-control" placeholder="Short Bio"name="field5" required />
</div>
</div>
<br><br>
	         <button id="send" value="Update" type="submit" name="sub" class="btn btn-block btn-lg">Register</button>
</form>

</div>
      <!-- <input name="submit" type="submit" value="Update" /> -->
 </body>
 </html>

























    </body>