<?php include'conn.php' ?>
<?php session_start();?>
<?php 
 if(!(isset($_SESSION['email']))){
header("location:index.html");

}
else{
$fname = $_SESSION['fname'];
// $lname = $_SESSION['lname'];

}
?>
<?php 
if (isset($_POST['save'])) {
$ansid=uniqid();
$user=$fname;
// $lname=$lname;
$quest=$_POST['quest'];
$ans=$_POST['ans'];
$query=mysqli_query($conn,"INSERT INTO subansw VALUES  ('$ansid','$user','$quest','$ans')") or die('Error61');
    echo "<script>alert('Answer added successfully.') </script>";
// $query="INSERT INTO `subansw` ( `ansid`, `user`,`quest`,`ans`) VALUES (`$ansid`,`$user`,
// `$quest`,`$ans`)";
//     if(mysqli_query($conn,$query)){
//         echo "<script>alert('Records added successfully.') </script>";
// } else{
//         echo "<script>alert('ERROR: Could not able to execute') </script>";
// }
 
}
?>

<?php
    $qt="SELECT * FROM subques";
    $rest= mysqli_query($conn,$qt);
    $options="";
   while($row2 = mysqli_fetch_array($rest)) {
       $options=$options."<option>$row2[quest]</option>";
//       $name = $row2['name'];
//       echo $name;
   }
  ?>

<html>
    <head>
           <meta charset="utf-8">
           <link rel="stylesheet" type="text/css" href="style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  .topnav a:hover{
    text-decoration: none;
  }
    .form-control {
  }
  border: 2px solid green;

}
.form-control:active {
    border-color: red;   
}
.form-control:focus{ border-color:red; }
.form-control:hover{ border-color:blue; }
#a{
   text-align: justify-all;
   font-size: 20px;
   font-family: sans-serif;
}
.form-horizontal button
 {
    background-color:#cd6f0d;
    color: white;

 }
  </style>
        
            <script type="text/javascript">
//auto expand textarea
// function adjust_textarea(rows) {
    // rows.style.height = "20px";
    // rows.style.height = (h.scrollHeight)+"px";
    // onkeyup="adjust_textarea(this)" 
// 
</script>
        
    </head>
    <body>
      <div class="topnav" id="myTopnav">
               <div class="topnav1" id="myTopnav"><a href="ulogout.php">Log Out</a><span id="b"><?php echo "Hello ". $_SESSION['fname']; ?></span></div>
                <a href="uaccount.php?q=8">Documents</a><a href="subansw.php">Subjective</a>
    <?php if(@$_GET['q']==2) ?><a href="uaccount.php?q=2">History</a>
    <?php if(@$_GET['q']==1) ?><a href="uaccount.php?q=1">Dashboard</a>
    
         </div> 

           </div>
           <br>
     <div class="container">
  <form action="subansw.php" method="POST" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Question:</label>
      <div class="col-sm-10">
         <select name="quest" class="form-control"> <?php echo $options; ?> </select>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Solution:</label>
      <div class="col-sm-10">          
       <!--  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"> -->
       <textarea placeholder="Write answer" class="form-control" id="a" name="ans" rows="15" required></textarea>
      </div>
    </div>
      

      
      <!-- <textarea placeholder="Write answer"name="ans" onkeyup="adjust_textarea(this)"></textarea> -->
      <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-block btn-lg" name="save">Submit</button>
    </div>
  </div>
</form>
<!--    <input type="button" name='sub' value="Submit" />-->
</div>

    </body>
</html>