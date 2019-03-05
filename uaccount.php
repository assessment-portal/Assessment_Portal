<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    #counter{
      height:30px;
      width:30px;
      font-weight: bold;
      border:none;
      float: right;
      margin-top: -422px;
      margin-right: -20px;
    }
    #rig{
       float: right;
      margin-top: -420px;
      margin-right: 10px;
    }
  </style>

<title>DASHBOARD</title>
    <link  rel="stylesheet" href="bootstrap.min.css"/>
<!--
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
-->
   <link rel="stylesheet" type="text/css" href="style1.css">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'conn.php';
?>
<body>
    
    
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<div class="header">
<div class="row">
<div class="col-lg-6">
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'conn.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:studentregister.php");

}
else
{
$fname = $_SESSION['fname'];
// $lname = $_SESSION['lname'];
$email=$_SESSION['email'];
$query="SELECT * FROM `studregister` WHERE fname='$fname' and email='$email'";
$res=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res)) {
  $subject = $row['subject'];
}
$_SESSION['subject']=$subject;
$sub=$_SESSION['subject']; 

// include_once 'conn.php';

}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->

    </div>
<div class="topnav" id="myTopnav">
               <div class="topnav1" id="myTopnav"><a href="ulogout.php">Log Out</a><span id="b"><?php echo "Hello ". $_SESSION['fname']; ?></span></div>
                <a href="uaccount.php?q=8">Documents</a><a href="subansw.php">Subjective</a>
    <?php if(@$_GET['q']==2) ?><a href="uaccount.php?q=2">History</a>
    <?php if(@$_GET['q']==1) ?><a href="uaccount.php?q=1">Dashboard</a>
    
         </div> 

           </div>

  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {
// ORDER BY date DESC
$result = mysqli_query($conn,"SELECT * FROM quiz WHERE title='$sub'") or die('Error');
echo  '<br><div class="panel"><div class="table-responsive"><table class="table table-striped" >
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
  <td><b><a href="uaccount.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32;color:#ffffff" ><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;
<span class="title1" onclick=gettime("'.$eid.'")><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="updateu.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red;color:#ffffff"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1" onclick=gettime("'.$eid.'")><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';
}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

<!--home closed-->

<!--quiz start-->
    <?php
//   $eid=0;
//    if(!isset($eid)){
//         $eid = $_GET['eid'];
//    }
//    else{
//         $eid = 0;
//    }
//    $resultt = mysqli_query($conn,"SELECT * FROM quiz where eid='$eid'") or die('Error');
//
//while($row = mysqli_fetch_array($resultt)) {
//  $time = $row['time'];
//    $time1=$time*60;
//    echo $time1;
//}
    ?>
    <script src="jquery-3.3.1.min.js"></script>
    <script >
        var cnt =0
         function gettime(eid){
                $.ajax({
                url:'getTime.php',
                data:{
                    eid:eid
                },
                type:'post',
                success:function(response){
                    alert(response)
                    cnt=parseInt(response)
                    counter(cnt)           
                },
                error:function(){
                    alert("failed")
                }
            })
            }
        $(function(){
//            alert('hi')
           
            
        })
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


function counter(cnt){
    console.log(typeof(cnt))
    
    if(getCookie("cnt") > 0){
  cnt = getCookie("cnt");
 }
 cnt -= 1;
 document.cookie = "cnt="+ cnt;
 jQuery("#counter").val(getCookie("cnt"));
 
 if(cnt>0){
  setTimeout(counter,1000);
 }
    
 if(cnt==0){

  console.log("Time up :(")
  alert("Time up :(")
 }
}

counter();
    </script>
<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($conn,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;:<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($conn,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="updateu.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}if($sn==1&&$sn==$total){
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
}
if($sn>=1&&$sn<$total){
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Next</button></form></div>';
}
if($sn==$total&&$sn!=1)
{
  echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
}
$sn++;
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
  echo  '<form name="counter">
    <strong id="rig">Timer : </strong>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="8" name="chandresh" id="counter">
</form>';
}
//r
  
          //result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($conn,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#193059 font-weight:bold">Result</h1></center><br />
<strong><p>Name : '.$_SESSION['fname'].'<br/>Email : '.$_SESSION['email'].'</p></strong><br/>
<table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '<tr style="color:#000000" ><td>Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#000000"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
    <tr style="color:#000000"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
    <tr style="color:#000000"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
$q=mysqli_query($conn,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
echo '<tr style="color:#000000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
echo '</table></div>';
echo '<button class="btn" onclick="myFunction()">Print</button>';

}
?>
<!--quiz end-->
<?php
//history start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($conn,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<br><div class="panel title">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($conn,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}


?>
    <?php 
    //if(@$_GET['q']==3) {

// $result = mysqli_query($conn,"SELECT * FROM subjective") or die('Error');
// echo  '<dsiv class="panel"><div class="table-responsive"><table class="table table-striped title1">
// <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td></td></tr>';
// $c=1;
// while($row = mysqli_fetch_array($result)) {
//   $title = $row['title'];
//   $total = $row['total'];
//   $sahi = $row['sahi'];
//   $eid = $row['eid'];
//$q12=mysqli_query($conn,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
//$rowcount=mysqli_num_rows($q12);  
//if($rowcount == 0){
//   echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td>
//   <td><b><a href="uaccount.php?q=subquiz&step=3&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
// //}
////else
//{
//echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
//  <td><b><a href="updateu.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
//}
// }
// $c=0;
// echo '</table></div></div>';

//}?>
    <?php
//if(@$_GET['q']== 'subquiz' && @$_GET['step']== 3) {
// $eid=@$_GET['eid'];
// $sn=@$_GET['n'];
// $total=@$_GET['t'];
// $q=mysqli_query($conn,"SELECT * FROM subquest WHERE eid='$eid' AND sn='$sn' " ) or die('error11');
// echo '<div class="panel" style="margin:5%">';
// while($row=mysqli_fetch_array($q) )
// {
// $qns=$row['qns'];
// $qid=$row['qid'];
// echo '<b>Question &nbsp;'.$sn.'&nbsp;:<br />'.$qns.'</b><br /><br />';

//     echo '<form action="updateu.php?q=subans&step=3&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
// <br />';
//     echo '<!-- Text input-->
// <div class="form-group">
//   <label class="col-md-12 control-label" for="desc"></label>  
//   <div class="col-md-12">
//   <textarea rows="8" cols="8" name="ans" class="form-control" placeholder="Write answer here..."></textarea>  
//   </div>
// </div>';
// }
//     echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
//}?>
<?php 
if(@$_GET['q']==8) {
  $sql="SELECT * FROM studregister WHERE fname='$fname' AND email='$email'";
  $res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res)) {
  $desg = $row['subject'];
}
$_SESSION['courses'] = $desg;
$courses=$desg;

 // echo '<table class="table table-bordered">  
 //                     <tr>  
 //                          <th>Documents</th>  
 //                     </tr> ' ; 
              echo '<table class="table table-striped" width="50%">
              
                <tr class="w-50 p-3" >
                  <th scope="col" font-weight="bold">Documents</th>
                  <th scope="col" class="w-25 p-3" font-weight="bold">Download</th>
                </tr>';
                $email=$_SESSION['email'];      
                $query = "SELECT * FROM upload_pdf_file WHERE courses='$courses'";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                  $pdf = $row['pdf_file'];
                     echo " <br> 
                          <tr>  
                          <td>
                          ".$pdf."
                          </td>
                               <td >  
                                  <a href='uploads/pdf/".$pdf."' download class='btn btn-primary'>Download</a>
                               </td>  
                          </tr>  
                     ";  
                }  
                }  
                echo "</table>";
                ?> 



</div></div></div></div>

<script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>
