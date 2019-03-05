<?php
include("conn.php");
session_start(); 
$id=$_REQUEST['id'];
$query = "SELECT * FROM questions WHERE `qid`='$id'"; 
$result = mysqli_query($conn, $query) or die ("error11");
$row = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM options WHERE `qid`='$id'"; 
$result1 = mysqli_query($conn, $query1) or die ("error11");
$option = [];
$optionId = [];
$i=0;
while($row1 = mysqli_fetch_array($result1)) {
  $option[$i] = $row1['option'];
  $optionid[$i] = $row1['optionid'];
  $i++;
  }
$query3= "SELECT * FROM answer WHERE `qid`='$id'";
$result2= mysqli_query($conn,$query3) or die("error3");
while($row2 = mysqli_fetch_array($result2)) {
  $ansid = $row2['ansid'];
}
$query4= "SELECT * FROM options WHERE `optionid`='$ansid'";
$result4= mysqli_query($conn,$query4) or die("error4");
while($row8 = mysqli_fetch_array($result4)) {
  $opt = $row8['option'];
  ?>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Quiz</title>
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
    	margin: -60px 20px;
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
        margin-top: 100px;
         width: 600px;
  height: 405px;
  
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
.container input,select{
     background-color: #f2f2f2;
     width: 270px;
     padding-top:10px;
     margin-top: 6px;
   }
      </style>
</head>
<body>
	<a href="dash.php?q=0.php" class="btn btn-primary" id="back">Back</a>
<div class="form">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$qns =$_REQUEST['qns'];
// $optionn1 =$_REQUEST['option1'];
// $optionn2 =$_REQUEST['option2'];
// $optionn3 =$_REQUEST['option3'];
// $optionn4 =$_REQUEST['option4'];
// $submittedby = $_SESSION["manager"];
// $update="update teacherreg set 
// name='".$name."', email='".$email."',desg='".$desg."',contactno='".$contactno."',
// bio='".$bio."' where tid='".$id."'";
for ($i=1; $i <=4 ; $i++) { 
	# code...
	$a=$optionid[$i-1];
	$b=$_REQUEST['option'.$i];
	$update="UPDATE options SET option='$b' WHERE `optionid`='$a'";
	$res=mysqli_query($conn, $update) or die("error");
	$update1="UPDATE questions SET qns='$qns' WHERE qid='$id'";
	$res1=mysqli_query($conn, $update1) or die("error");
}
// $eid=@$_GET['eid'];
// $sn=@$_GET['n'];
// $total=@$_GET['t'];
// header("location:account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'");

}else {
?>




<div class="container">
	<p id="p">Update Record</p>
  <center><p><strong>Correct Option is <?php echo $opt ?></strong></p></center>
<form name="form" class="form-group" method="post" action=""> 
	<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row ['qid'];?>" />
	<div class="row">
      <div class="col-lg-6">
	     <label>Question</label>
      </div>
      <div class="col-lg-6">
<input type="text" class="form-control" name="qns" placeholder="Enter Qns" 
required value="<?php echo $row['qns'];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Option 1</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="option1" class="form-control" placeholder="Enter Option" 
required value="<?php echo $option[0];?>"/>
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Option 2</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="option2" class="form-control" placeholder="Enter Option" 
required value="<?php echo $option[1];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Option 3</label>
      </div>
       <div class="col-lg-6">
       	<input type="text" name="option3" class="form-control" placeholder="Enter Option" 
required value="<?php echo $option[2];?>" />
</div>
</div>
<div class="row">
      <div class="col-lg-6">
	     <label>Option 4</label>
      </div>
       <div class="col-lg-6">
       <input type="text" name="option4" class="form-control" placeholder="Enter Option" 
required value="<?php echo $option[3];?>" /></div>
</div>
<br><br>
	         <button id="send" value="Update" type="submit" name="submit" class="btn btn-block btn-lg">Update</button>
</form>
<?php } ?>

</div>
</div>
</body>
</html>