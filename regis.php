<?php include'conn.php' ?>
<?php session_start(); ?>
<?php 
//$varid=$_SESSION['manager'];
if (isset($_POST['subm'])) {
$var1=$_POST['fname'];
$var2=$_POST['lname'];
$var3=$_POST['email'];
$var4=$_POST['phone'];
$var5=$_POST['pass'];
    $var=base64_encode($var5);
$var6=$_POST['repass'];
    $varc=base64_encode($var6);
$var7=$_POST['sex'];
$var8=$_POST['sub'];
$var9=$_POST['add'];
if($var5!=$var6){
    echo "<script>alert('Password not matched'); window.location.href='index.html';</script>";
}else{
$query="INSERT INTO `studregister` ( `fname`,`lname`, `email`,`contactno`,`pass`,`cpas`,`gender`,`subject`,  `address`) VALUES ('$var1','$var2','$var3','$var4','$var','$varc','$var7','$var8','$var9')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Records added successfully.'); window.location.href='index.html'; </script>";
} else{
        echo "<script>alert('ERROR: Could not able to execute') </script>";

}
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
<!DOCTYPE html>
<html>
<head>
   <title>Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
    #ui{
        background-color: #ffffff;
        padding: 30px 50px 50px 50px;
        margin-top: 10px;
        border-radius: 10px;
        opacity: 1;
        
    }
   #ui input{
     background-color: #f2f2f2;
   }
    #ui label{
        color: #fff;
    }

    #p{
    
        margin-top: 10px;
        margin-left: 30px;
        font-size: 40px;
        color:  #193059;
        font-weight: bold;
}
    .a{
        float: center;
        margin-top: 10px;

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
    
 
<script type="text/javascript">

function valid()                                    
{ 
    var name = document.forms["RegForm"]["fname"];               
    var email = document.forms["RegForm"]["email"];    
    var phone = document.forms["RegForm"]["phone"];  
    var what =  document.forms["RegForm"]["sub"];  
    // var password = document.forms["RegForm"]["pass"]; 
    // var cpassword = document.forms["RegForm"]["repass"];   
    var address = document.forms["RegForm"]["add"];  
   
    if (name.value == "")                                  
    { 
        window.alert("Please enter your first name."); 
        name.focus(); 
        return false; 
    } 
   
    if (address.value == "")                               
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
   
    if (password.value == "")                        
    { 
        window.alert("Please enter your password"); 
        password.focus(); 
        return flase; 
    } 
    if (cpassword.value == "")                        
    { 
        window.alert("Please enter your  confirm password"); 
        password.focus(); 
        return flase; 
    } 
  var pass=document.getElementById("numm").value
  var repass=document.getElementById("numm1").value
   if(pass!=repass){ 
   alert("password must be same!");
   return false;
   }
   return true; 

   
    if (what.selectedIndex < 1)                  
    { 
        alert("Please enter your course."); 
        what.focus(); 
        return false; 
    } 
   
    return true; 
}


</script>

</head>
<body>
    <div class="a">
         <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                 <div id="ui">
                     
                    <p id="p">REGISTRATION FORM</p>
                     <br>
                     

                     <form  action="regis.php" method="POST" class="form-group" name="RegForm" onSubmit="return valid()">
                         <div class="row">
                             <div class="col-lg-6">
<!--                                 <label>First Name</label>-->
                                 <input type="text" name="fname" class="form-control" placeholder="Enter Your First Name"  >
                             </div>
                             
                             <div class="col-lg-6">
<!--                                 <label>Last Name</label>-->
                                 <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" >
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="col-lg-6">
<!--                                 <label>Email</label>-->
                                 <input type="text" name="email" class="form-control" placeholder="Enter Your Email" >
                             </div>
                             
                             <div class="col-lg-6">
<!--                                 <label>Phone</label>-->
                                 <input type="text" name="phone" id="numm" class="form-control" placeholder="Enter Your Phone No " required pattern="[6-9]{1}[0-9]{9}">
                             </div>
                         </div>
                         <br>
                          <div class="row">
                             <div class="col-lg-6">
<!--                                 <label>Password</label>-->
                                 <input type="password" name="pass" class="form-control" id="numm" placeholder="Enter Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                             </div>
                             
                             <div class="col-lg-6">
<!--                                 <label>Retype Password</label>-->
                                 <input type="password" name="repass" class="form-control" id="numm1" placeholder="Retype Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                             </div>
                         </div>
                              <br>
                         <div class="row">
                             <div class="col-lg-6">
<!--                                 <label>Gender</label>-->
                                 <select class="form-control"  name="sex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="others">Others</option>
                                 </select>
                             </div>
                             
                             <div class="col-lg-6">
<!--                                 <label>Course</label>-->
                                 <select name="sub" value="a" class="form-control">
                                    <?php echo $options; ?> 
                                 </select>
                             </div>
                        </div>
                         <br>
<!--                         <label>Address</label>-->
                         <textarea name="add" class="form-control" rows="3" placeholder="Enter Your Address"  ></textarea>
<!--                                 <textarea placeholder="Address" name="field7"  class="form-control" onkeyup="adjust_textarea(this)" required></textarea>-->
                         <br>
                       <!--   <button type="button" class="btn  btn-block btn-lg" name="subm" >Submit</button> -->
                        <button name="subm" class="btn  btn-block btn-lg">Register</button>
                     </form>
                  </div>
         </div>
         <div class="col-lg-3"></div>
         
    
    
    
    
    
    </div>
    
    
    
    
    
    
    
    
    
    </body>
