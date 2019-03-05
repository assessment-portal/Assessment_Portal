<?php
include('dashboard.php');
?>
<html>
<head>
<title>DASHBOARD</title>
    <link  rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="searchbar.css">
    <!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
    #wid{
      width:119%;
      margin-left: -100px;
    }
    #right1{
      float: right;
    }
    #left{
      float: left;
    }
    .topnav{
      width:119%;
      margin-left: -100px;
      margin-bottom: 5px;
      padding-bottom: 7px;
    }
    .container1{
      width:500px;
      height:520px;
      margin-left: 270px;
      padding-left: 50px;
      padding-right: -30px;
      border-radius:10px;
      border: 2px solid #193059;
      border-s
    }
    .container1 input{
      width:400px;
    }
    #ta{
      width:400px;
    }
.form-group button
 {
    background-color:#cd6f0d;
    color: white;
    width:400px;
 }
</style>
<script type="text/javascript">
  

</script>
</head>
<br>

<body  style="background:#f2f2f2;">
           <script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<div class="header">
<div class="row">
<div class="col-lg-6">

<?php
 include_once 'conn.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['manager']))){
header("location:admin.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'conn.php';

}?>

</div></div>
<!-- admin start-->
    
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($conn,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td><b>Description</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
    $intro = $row['intro'];
	$eid = $row['eid'];
$q12=mysqli_query($conn,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td><td>'.$intro.'</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32;color:#ffffff"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td><td>'.$intro.'</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red;color:#ffffff"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($conn,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>Rank</b></td><td><b>Fname</b></td><td><b>Lname</b></td><td><b>Email</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($conn,"SELECT * FROM studregister WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$nam=$row['fname'];
$nam1=$row['lname'];
$email=$row['email'];
//$college=$row['college'];
}
$c++;
echo '<tr><td style="color:black"><b>'.$c.'</b></td><td>'.$nam.'</td><td>'.$nam1.'</td><td>'.$email.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {
  $qt="SELECT * FROM teacherreg";
    $rest= mysqli_query($conn,$qt);
    $options="";
   while($row2 = mysqli_fetch_array($rest)) {
       $options=$options."<option>$row2[name]</option>";
//       $name = $row2['name'];
//       echo $name;
   }
 
   echo '<div class="topnav"><div class="search-container" id="left"><form method="post" action="search.php?q=searchsubject"><input type="text" name="subsr" placeholder="Search Subject" required/><button type="submit" name="sears"><i class="fa fa-search"></i></button></form></div><div class="search-container" id="right1"><form method="post" action="search.php?q=searchteacher"><input type="text" name="tachsr" placeholder="Search Teacher" required/><button type="submit" name="searth"><i class="fa fa-search"></button></form></div></div>';
$result = mysqli_query($conn,"SELECT * FROM studregister") or die('Error');


    $page_data =mysqli_query($conn,"SELECT * FROM studregister") or die('Error');
echo  '<div class="panel" id="wid"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b> Fname</b></td><td><b> Lname</b></td><td><b>Gender</b></td><td><b>Email</b></td><td><b>Subject</b></td><td><b>ContactNo.</b></td><td><b>Address</b></td><td><b>Teacher</b></td><td><b>Add Teacher</b></td><td><b>Edit</b></td><td><b>Delete</b></td><td></td></tr>';
$c=1;
    
while($row = mysqli_fetch_array($page_data)) {
	$name = $row['fname'];
  $name1 = $row['lname'];
  $sex=$row['Gender'];
	$email = $row['email']; 
	$subject = $row['subject'];
    $contactno = $row['contactno'];
	$address = $row['address'];
    $teacher = $row['teacher'];
?>
	<tr><td><?php echo $c++; ?></td><td><?php echo $name; ?></td><td><?php echo $name1; ?></td><td><?php echo $sex; ?></td><td><?php echo $email; ?></td><td><?php echo $subject; ?></td><td><?php echo $contactno; ?></td><td><?php echo $address; ?></td><td><?php echo $teacher; ?></td>
    <td><form method="POST" action="update.php?q=updatestudregister"><select name="field5"> <?php echo $options; ?> </select>   <input type="hidden" name="email" value="<?php echo $email?>"/>
        <button type="submit" name="sub">save</button></form></td>
        <td><a href="edits.php?id=<?php echo $row["sid"]; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="deletes.php?id=<?php echo $row["sid"]; ?>" class="btn btn-danger">Delete</a></td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span  aria-<?phphidden="true"></span></b></a></td></tr>
    
<?php
    }
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->




<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo '
<div class="container1">
<div class="row">
<span class="title1" style="margin-left:20%;font-size:30px;color:#193059;margin-top:10px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">  
 <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number" required>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="4" cols="8" name="desc" id="ta" class="form-control" placeholder="Write description here..." required></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    
    <button name="submit" class="btn  btn-block btn-lg">Submit</button>
  </div>
</div>
</fieldset>
</form>
</div></div>';



}
?>
<!--add quiz end-->

    

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..." required></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text" required>
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($conn,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
    $_SESSION['time']=$time;
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red;color:#ffffff"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>
<?php
// if(@$_GET['q']==6 && !(@$_GET['step']) ) {
// echo ' 
// <div class="row">
// <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Subjective Details</b></span><br /><br />
//  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addsub"  method="POST">
// <fieldset>

// <!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="name"></label>  
//   <div class="col-md-12">
//   <input id="name" name="name" placeholder="Enter Subjective title" class="form-control input-md" type="text">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="total"></label>  
//   <div class="col-md-12">
//   <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="right"></label>  
//   <div class="col-md-12">
//   <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
//   </div>
// </div>


// <!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="desc"></label>  
//   <div class="col-md-12">
//   <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
//   </div>
// </div>


// <div class="form-group">
//   <label class="col-md-12 control-label" for=""></label>
//   <div class="col-md-12"> 
//     <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
//   </div>
// </div>

// </fieldset>
// </form></div>';



// }
// ?>
<?php
// if(@$_GET['q']==7 && (@$_GET['step'])==3 ) {
// echo ' 
// <div class="row">
// <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
//  <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addsqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'"  method="POST">
// <fieldset>
// ';
 
//  for($i=1;$i<=@$_GET['n'];$i++)
//  {
// echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
//   <div class="col-md-12">
//   <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
//   </div>
// </div>';

//  }
    
// echo '<div class="form-group">
//   <label class="col-md-12 control-label" for=""></label>
//   <div class="col-md-12"> 
//     <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
//   </div>
// </div>

// </fieldset>
// </form></div>';



// }
?><!--add quiz step 2 end-->
 
</div><!--container closed-->
</div></div>
</body>
</html>
